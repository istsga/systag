<?php

namespace Database\Seeders;

use App\Models\Docente;
use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DESARROLLO DE SOFWARE
        Docente::create([
            'tipo_identificacion'   => '1',
            'dni'                   => '0204002040',
            'nombre'                => 'Angel',
            'apellido'              =>  'Huilca',
            'email'                 =>  'angelhuilca@gmail.com',
            'titulo_academico'      => 'Ingeniero Sistemas',
            'abreviatura'           => 'Ing.',
            'fecha_ingreso'         => '2020-12-29',
            'telefono_fijo'         => '2916380',
            'telefono_movil'        => '0982750001',
            'provincia_id'          => '06',
            'cantone_id'            => '43',
            'calle'                 => '10 de Agosto',
            'estado'                =>'1',
            'tipocontrato_id'       => '2',
        ]);

        Docente::create([
            'tipo_identificacion'   => '1',
            'dni'                   => '0623429692',
            'nombre'                => 'William',
            'apellido'              =>  'Adriano',
            'email'                 =>  'adriano@gmail.com',
            'titulo_academico'      => 'Ingeniero Sistemas Informaticos',
            'abreviatura'           => 'Ing.',
            'fecha_ingreso'         => '2020-12-29',
            'telefono_fijo'         => '2916320',
            'telefono_movil'        => '0982750110',
            'provincia_id'          => '06',
            'cantone_id'            => '43',
            'calle'                 => '10 de Agosto',
            'estado'                =>'1',
            'tipocontrato_id'       => '2',
        ]);

        Docente::create([
            'tipo_identificacion'   => '1',
            'dni'                   => '0456208000',
            'nombre'                => 'Segundo',
            'apellido'              =>  'Chavez',
            'email'                 =>  'segundochavez@gmail.com',
            'titulo_academico'      => 'Ingeniero',
            'abreviatura'           => 'Ing.',
            'fecha_ingreso'         => '2020-12-29',
            'telefono_fijo'         => '3856900',
            'telefono_movil'        => '0978988699',
            'provincia_id'          => '06',
            'cantone_id'            => '43',
            'calle'                 => '10 de Agosto',
            'estado'                =>'1',
            'tipocontrato_id'       => '2',
        ]);

        //CONTABILIDAD
        Docente::create([
            'tipo_identificacion'   => '1',
            'dni'                   => '0204002512',
            'nombre'                => 'Magaly',
            'apellido'              =>  'Coello',
            'email'                 =>  'magalycoello@gmail.com',
            'titulo_academico'      => 'Ingeniera Contabilidad',
            'abreviatura'           => 'Ing.',
            'fecha_ingreso'         => '2020-12-29',
            'telefono_fijo'         => '2916363',
            'telefono_movil'        => '0982755551',
            'provincia_id'          => '06',
            'cantone_id'            => '43',
            'calle'                 => '10 de Agosto',
            'estado'                =>'1',
            'tipocontrato_id'       => '2',
        ]);

        Docente::create([
            'tipo_identificacion'   => '1',
            'dni'                   => '0204232512',
            'nombre'                => 'Wiliam',
            'apellido'              =>  'Nieto',
            'email'                 =>  'wiliamnieto@gmail.com',
            'titulo_academico'      => 'Master Contabilidad',
            'abreviatura'           => 'Ms.',
            'fecha_ingreso'         => '2020-12-29',
            'telefono_fijo'         => '3216363',
            'telefono_movil'        => '0982736401',
            'provincia_id'          => '06',
            'cantone_id'            => '43',
            'calle'                 => '10 de Agosto',
            'estado'                =>'1',
            'tipocontrato_id'       => '2',
        ]);

        //ENFERMERIA

        Docente::create([
            'tipo_identificacion'   => '1',
            'dni'                   => '0204278952',
            'nombre'                => 'Margaria',
            'apellido'              =>  'Quesada',
            'email'                 =>  'margaritaquesada@gmail.com',
            'titulo_academico'      => 'Doctora Enfermeria',
            'abreviatura'           => 'Doc.',
            'fecha_ingreso'         => '2020-12-29',
            'telefono_fijo'         => '3216921',
            'telefono_movil'        => '0982730164',
            'provincia_id'          => '06',
            'cantone_id'            => '43',
            'calle'                 => '10 de Agosto',
            'estado'                =>'1',
            'tipocontrato_id'       => '2',
        ]);

        Docente::create([
            'tipo_identificacion'   => '1',
            'dni'                   => '0265218952',
            'nombre'                => 'Guillero ',
            'apellido'              =>  'Balseca',
            'email'                 =>  'guillermobalseca@gmail.com',
            'titulo_academico'      => 'Doctor',
            'abreviatura'           => 'Doc.',
            'fecha_ingreso'         => '2020-12-29',
            'telefono_fijo'         => '3299921',
            'telefono_movil'        => '0978930164',
            'provincia_id'          => '06',
            'cantone_id'            => '43',
            'calle'                 => '10 de Agosto',
            'estado'                =>'1',
            'tipocontrato_id'       => '2',
        ]);

        Docente::create([
            'tipo_identificacion'   => '1',
            'dni'                   => '0459818952',
            'nombre'                => 'Erika ',
            'apellido'              =>  'Pelaes',
            'email'                 =>  'erikapelaes@gmail.com',
            'titulo_academico'      => 'Licenciada',
            'abreviatura'           => 'Lic.',
            'fecha_ingreso'         => '2020-12-29',
            'telefono_fijo'         => '3200921',
            'telefono_movil'        => '0978930633',
            'provincia_id'          => '06',
            'cantone_id'            => '43',
            'calle'                 => '10 de Agosto',
            'estado'                =>'1',
            'tipocontrato_id'       => '2',
        ]);

        //ODONTOLOGIA
        Docente::create([
            'tipo_identificacion'   => '1',
            'dni'                   => '0450008952',
            'nombre'                => 'Fernanda',
            'apellido'              =>  'Chavez',
            'email'                 =>  'fernandachavez@gmail.com',
            'titulo_academico'      => 'Tecnologia',
            'abreviatura'           => 'Tlg.',
            'fecha_ingreso'         => '2020-12-29',
            'telefono_fijo'         => '3200900',
            'telefono_movil'        => '0978999633',
            'provincia_id'          => '06',
            'cantone_id'            => '43',
            'calle'                 => '10 de Agosto',
            'estado'                =>'1',
            'tipocontrato_id'       => '2',
        ]);

    }
}
