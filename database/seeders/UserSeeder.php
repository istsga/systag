<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Roles predeterminados SYSTAG
        $administrador  =   Role::create(['name'=>'Administrador']);
        $estudiante     =   Role::create(['name'=>'Estudiante']);
        $docente        =   Role::create(['name'=>'Docente']);

        //Usuarios predeterminados SYSTAG
        $UserAdmin = new User;
        $UserAdmin->dni = '0604429696';
        $UserAdmin->nombre = 'Diego Armando';
        $UserAdmin->apellido = 'Guapi Cuji';
        $UserAdmin->email = 'diego_g11@hotmail.es';
        $UserAdmin->password = '12345678';
        $UserAdmin->save();
        $UserAdmin->assignRole($administrador);

        $UserAdmin = new User;
        $UserAdmin->dni = '0602721516';
        $UserAdmin->nombre = 'TANIA ELIZABETH';
        $UserAdmin->apellido = 'GARZÓN CABEZAS';
        $UserAdmin->email = 'taniagarzon73@hotmail.com';
        $UserAdmin->password = '12345678';
        $UserAdmin->save();
        $UserAdmin->assignRole($administrador);

        $UserAdmin = new User;
        $UserAdmin->dni = '0603621780';
        $UserAdmin->nombre = 'FERNANDA';
        $UserAdmin->apellido = 'PALMA SALAZAR';
        $UserAdmin->email = 'valeria-kaye@hotmail.com';
        $UserAdmin->password = '12345678';
        $UserAdmin->save();
        $UserAdmin->assignRole($administrador);

        // $UserStudent = new User;
        // $UserStudent->dni = '0605082063';
        // $UserStudent->nombre = 'Estudiante';
        // $UserStudent->apellido = 'User';
        // $UserStudent->email = 'estudiante@gmail.com';
        // $UserStudent->password = '12345678';
        // $UserStudent->save();
        // $UserStudent->assignRole($estudiante);

        // $UserDocente = new User;
        // $UserDocente->dni = '0605082062';
        // $UserDocente->nombre = 'Docente';
        // $UserDocente->apellido = 'User';
        // $UserDocente->email = 'docente@gmail.com';
        // $UserDocente->password = '12345678';
        // $UserDocente->save();
        // $UserDocente->assignRole($docente);

        // $UserDocente = new User;
        // $UserDocente->dni = '0204002040';
        // $UserDocente->nombre = 'Angel ';
        // $UserDocente->apellido = 'Huilca';
        // $UserDocente->email = 'angelhuilca@gmail.com';
        // $UserDocente->password = '12345678';
        // $UserDocente->save();
        // $UserDocente->assignRole($docente);

        $UserDocente = new User;
        $UserDocente->dni = '0623429692';
        $UserDocente->nombre = 'William ';
        $UserDocente->apellido = 'Adriano';
        $UserDocente->email = 'adriano@gmail.com';
        $UserDocente->password = '12345678';
        $UserDocente->save();
        $UserDocente->assignRole($docente);
    }
}
