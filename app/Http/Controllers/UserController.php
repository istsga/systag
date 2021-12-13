<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Image;
use Auth;
//use Intervention\Image\Facades\Image;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Providers\UserWasCreated;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $this->authorize('create', User::class);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::orderBy('id' )->pluck('name', 'id');
        return view('users.create', compact('user', 'roles', 'permissions'));
    }

    public function getUsuarios($id)
    {
        $user = Estudiante::where('dni',$id)->get();
        if(count($user)==0){
            $user = Docente::where('dni',$id)->get();
        }
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $data = $request->validate(
            [
                'dni' => ['required', 'digits:10', 'unique:users'],
                'nombre' => ['required', 'regex:/^[\pL\s\-]+$/u', 'string', 'max:255'],
                'apellido' => ['required', 'regex:/^[\pL\s\-]+$/u',  'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

        //Configuracion roles
        $dni=$request->dni;
        $role=$request->roles;
        $estudiante = Estudiante::where('dni',$dni)->get();
        if(count($estudiante)>0){
            $role='Estudiante';
        }

        $docente = Docente::where('dni',$dni)->get();
        if(count($docente)>0){
            $role='Docente';
        }

        $data['password'] =  Str::random(8);

        $user = User::create($data);

        $user->assignRole($role);

        $user->givePermissionTo($request->permissions);

        UserWasCreated::dispatch($user, $data['password']);

        return redirect()->route('users.index')->with('status', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( User $user)
    {
        $this->authorize('view', $user);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::orderBy('id' )->pluck('name', 'id');
        return view('users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request,  User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->validated() );
        return redirect()->route('users.index', $user)->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'Eliminado con éxito');
    }

    //Avatar Usurios
    public function profile()
    {
        $user = \Auth::user();
        return view('users.partials.profile',compact('user',$user));
    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();


            // if ($user->avatar !== 'default.png') {
            if ($user->avatar !== null) {
                //$file = public_path('uploads/avatars/' . $user->avatar);
                $file = 'uploads/avatars/' . $user->avatar;

                if (\File::exists($file)) {
                    unlink($file);
                }

            }
            //Image::make($avatar)->resize(300, 300)->save('uploads/avatars/' . $filename);
            Image::make($avatar)->resize(300, 300)->save('uploads/avatars/' . $filename);
            $user = \Auth::user();
            $user->avatar = $filename;
            $user->save();
        }


        return back()
            ->with('success','Has subido la imagen correctamente.');
    }

}
