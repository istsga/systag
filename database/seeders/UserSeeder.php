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
        $UserAdmin->dni = '0601817679';
        $UserAdmin->nombre = 'Olga';
        $UserAdmin->apellido = 'Villagran Caceres';
        $UserAdmin->email = 'sangabrielriobamba@hotmail.com';
        $UserAdmin->password = '12345678';
        $UserAdmin->save();
        $UserAdmin->assignRole($administrador);

        $UserAdmin = new User;
        $UserAdmin->dni = '0604429696';
        $UserAdmin->nombre = 'Administrator';
        $UserAdmin->apellido = 'Faker';
        $UserAdmin->email = 'fakeradmin@gmail.com';
        $UserAdmin->password = '12345678';
        $UserAdmin->save();
        $UserAdmin->assignRole($administrador);

        $UserAdmin = new User;
        $UserAdmin->dni = '0602721516';
        $UserAdmin->nombre = 'Tania Elizabeth';
        $UserAdmin->apellido = 'Garzon Cabezas';
        $UserAdmin->email = 'taniagarzon73@hotmail.com';
        $UserAdmin->password = '12345678';
        $UserAdmin->save();
        $UserAdmin->assignRole($administrador);

        $UserAdmin = new User;
        $UserAdmin->dni = '0603621780';
        $UserAdmin->nombre = 'Fernanda';
        $UserAdmin->apellido = 'Palma Salazar';
        $UserAdmin->email = 'valeria-kaye@hotmail.com';
        $UserAdmin->password = '12345678';
        $UserAdmin->save();
        $UserAdmin->assignRole($administrador);

        // $UserStudent = new User;
        // $UserStudent->dni = '0605312894';
        // $UserStudent->nombre = 'Juan Carlos';
        // $UserStudent->apellido = 'Rovalino Alarcon';
        // $UserStudent->email = 'jrobalino@gmail.com';
        // $UserStudent->password = '12345678';
        // $UserStudent->save();
        // $UserStudent->assignRole($estudiante);

        // $UserDocente = new User;
        // $UserDocente->dni = '0623429692';
        // $UserDocente->nombre = 'William';
        // $UserDocente->apellido = 'Adriano';
        // $UserDocente->email = 'adriano@gmail.com';
        // $UserDocente->password = '12345678';
        // $UserDocente->save();
        // $UserDocente->assignRole($docente);
    }
}
