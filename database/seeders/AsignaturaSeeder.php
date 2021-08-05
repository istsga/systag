<?php

namespace Database\Seeders;

use App\Models\Asignatura;
use Illuminate\Database\Seeder;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'DS1B1',
            'nombre'                => 'Técnicas de Expresión Oral y Escrita',
            'cantidad_hora'          => '40',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'DS1P2',
            'nombre'                => 'Matemáticas',
            'cantidad_hora'          => '40',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'DS1P3',
            'nombre'                => 'Etnia, Género y Saberes Ancestrales',
            'cantidad_hora'          => '40',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'DS1P4',
            'nombre'                => 'Fundamentos de Informática',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'DS1P5',
            'nombre'                => 'Electrónica Básica',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'DS1P6',
            'nombre'                => 'Sistemas Operativos',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'DS2B1',
            'nombre'                => 'Proyectos de Inversión Tecnólogicos',
            'cantidad_hora'          => '40',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'DS2P2',
            'nombre'                => 'Software Libre',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'DS2P3',
            'nombre'                => 'Didáctica Informática',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'DS2P4',
            'nombre'                => 'Estructura de Datos',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'DS2P5',
            'nombre'                => 'Lenguaje de Programación I',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'DS2P6',
            'nombre'                => 'Arquitectura y Mantenimiento de Computadores',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'DS3P1',
            'nombre'                => 'Análisis y Diseño de Sistemas',
            'cantidad_hora'          => '40',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'DS3P2',
            'nombre'                => 'Base de Datos',
            'cantidad_hora'          => '60',
        ]);

        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'DS3P3',
            'nombre'                => 'Lenguaje de Programación II',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'DS3P4',
            'nombre'                => 'Redes de Computadores',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'DS3P5',
            'nombre'                => 'Introducción a la Web',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'DS3P6',
            'nombre'                => 'Lenguaje de Bajo Nivel',
            'cantidad_hora'          => '40',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'DS4P1',
            'nombre'                => 'Programación SQL',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'DS4P2',
            'nombre'                => 'Programación PHP',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'DS4P3',
            'nombre'                => 'Programación en Java',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'DS4P4',
            'nombre'                => 'Seguridad Informática',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'DS4P5',
            'nombre'                => 'Sistemas Cliente Servidor',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'DS5P1',
            'nombre'                => 'Auditoría de Sistemas',
            'cantidad_hora'          => '40',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'DS5P2',
            'nombre'                => 'Aplicaciones Web',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'DS5P3',
            'nombre'                => 'Administración de Data Centers',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'DS5P4',
            'nombre'                => 'Programación en Dispositivos Móviles',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'DS5P5',
            'nombre'                => 'Negocios en Internet',
            'cantidad_hora'          => '50',
        ]);

    //CONTABILIDAD

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-B-01-002',
        'nombre'                    => 'Etnia, Género y Saberes Ancestrales',
        'cantidad_hora'             => '90',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-B-01-001',
        'nombre'                    => 'Técnicas de Expresión Oral y Escrita',
        'cantidad_hora'             => '80',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-P-01-003',
        'nombre'                    => 'Matemática Financiera I',
        'cantidad_hora'             => '160',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-P-01-004',
        'nombre'                    => 'Redacción Mercantíl',
        'cantidad_hora'             => '110',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-P-01-005',
        'nombre'                    => 'Contabilidad Básica',
        'cantidad_hora'             => '240',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-P-01-006',
        'nombre'                    => 'Informática Media',
        'cantidad_hora'             => '180',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-B-02-001',
        'nombre'                    => 'Metodología de la Investigación',
        'cantidad_hora'             => '80',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-002',
        'nombre'                    => 'Ley de Companías',
        'cantidad_hora'             => '120',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-003',
        'nombre'                    => 'Derecho Laboral',
        'cantidad_hora'             => '120',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-004',
        'nombre'                    => 'Microeconomía',
        'cantidad_hora'             => '140',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-005',
        'nombre'                    => 'Matemática Financiera II',
        'cantidad_hora'             => '150',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-006',
        'nombre'                    => 'Contabilidad General',
        'cantidad_hora'             => '170',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-B-03-001',
        'nombre'                    => 'Estadística I',
        'cantidad_hora'             => '110',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-002',
        'nombre'                    => 'Administración de Empresas',
        'cantidad_hora'             => '110',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-003',
        'nombre'                    => 'Derecho Tributario',
        'cantidad_hora'             => '100',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-004',
        'nombre'                    => 'Contabilidad Comercial',
        'cantidad_hora'             => '170',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-005',
        'nombre'                    => 'Contabilidad de Costos I',
        'cantidad_hora'             => '180',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-006',
        'nombre'                    => 'Macroeconomía',
        'cantidad_hora'             => '130',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-B-04-001',
        'nombre'                    => 'Estadística II',
        'cantidad_hora'             => '90',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-P-04-002',
        'nombre'                    => 'Presupuestos',
        'cantidad_hora'             => '110',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-P-04-003',
        'nombre'                    => 'Análisis Finciero',
        'cantidad_hora'             => '140',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-P-04-004',
        'nombre'                    => 'Contabilidad de Costos II',
        'cantidad_hora'             => '210',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-P-04-005',
        'nombre'                    => 'Aplicaciones Tributarias',
        'cantidad_hora'             => '100',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-B-05-001',
        'nombre'                    => 'Ética Profesional Social y Personal',
        'cantidad_hora'             => '50',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-B-05-002',
        'nombre'                    => 'Gestión de Talento Humano',
        'cantidad_hora'             => '50',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-P-05-003',
        'nombre'                    => 'Contabilidad Finaciera ',
        'cantidad_hora'             => '150',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-B-05-004',
        'nombre'                    => 'Contabilidad Gubernamental',
        'cantidad_hora'             => '170',
        ]);

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-B-05-005',
        'nombre'                    => 'Paquetes Contables',
        'cantidad_hora'             => '90',
        ]);

        //ENFERMERÍA

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'EN1B1',
            'nombre'                => 'Enfermería Básica',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'EN1P2',
            'nombre'                => 'Bioquímica',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'EN1P3',
            'nombre'                => 'Morfología Humana',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'EN1P4',
            'nombre'                => 'Bioética en Enfermería',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'EN1P5',
            'nombre'                => 'Desarrollo Personal, Social y Deportivo',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'EN1P6',
            'nombre'                => 'Comunicación e Interación Humana',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'EN2B1',
            'nombre'                => 'Enfermería Básica II',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'EN2P2',
            'nombre'                => 'Morfofisiología Humana II',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'EN2P3',
            'nombre'                => 'Nutrición y Dietética',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'EN2P4',
            'nombre'                => 'Microbiología y Parasitología',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'EN2P5',
            'nombre'                => 'Enfermería en Salud Mental y Gestión de los Cuidados Paleativos',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'EN2P6',
            'nombre'                => 'Tics Aplicadas en Enfermería',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'EN3P1',
            'nombre'                => 'Enfermería Familiar y Comunitaria',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'EN3P2',
            'nombre'                => 'Fisiopatología',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'EN3P3',
            'nombre'                => 'Farmacología General y Aplicada',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'EN3P4',
            'nombre'                => 'Estudio y Compresión de la Población',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'EN3P5',
            'nombre'                => 'Administración y Gestion de los Servicios de Enfermería',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'EN3P6',
            'nombre'                => 'Introducción a la Investigación',
            'cantidad_hora'         => '75',
        ]);


        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'EN4P1',
            'nombre'                => 'Salud Sexual y Reproductiva',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'EN4P2',
            'nombre'                => 'Enfermaría Materno Infantil y del Adolecente',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'EN4P3',
            'nombre'                => 'Estrategias de APS',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'EN4P4',
            'nombre'                => 'Administración de Medicamentos',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'EN4P5',
            'nombre'                => 'Terapias y Alternativas Ancestrales',
            'cantidad_hora'         => '75',
        ]);

//ODONTOLOGÍA
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'OD1P1',
            'nombre'                => 'Ética Profesional',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'OD1P2',
            'nombre'                => 'Tics en Odontología',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'OD1P3',
            'nombre'                => 'Étia Género y Saberes Ancestrales',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'OD1P4',
            'nombre'                => 'Comunicación e Interacción Humana',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'OD1P5',
            'nombre'                => 'Morfofisiología del Cuerpo Humano',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'OD1P6',
            'nombre'                => 'Odontología General',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'OD2P1',
            'nombre'                => 'Metodología de la Investigación',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'OD2P2',
            'nombre'                => 'Materiales Dentales',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'OD2P3',
            'nombre'                => 'Educación Para la Salud',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'OD2P4',
            'nombre'                => 'Morfofisiología Bucal',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'OD2P5',
            'nombre'                => 'Patología Dental Prevalente',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'OD2P6',
            'nombre'                => 'Normas de Bioseguridad Esterilización y Trabajos a Cuatro Manos',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'OD3P1',
            'nombre'                => 'Administración de Clínica o Consultorio Dental',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'OD3P2',
            'nombre'                => 'Prostodoncia',
            'cantidad_hora'         => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'OD3P3',
            'nombre'                => 'Periodoncia',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'OD3P4',
            'nombre'                => 'Operatoria Dental',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'OD3P5',
            'nombre'                => 'Estética Dental',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'OD3P6',
            'nombre'                => 'Cirugía y Radiología Dental',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'OD4P1',
            'nombre'                => 'Odontopediatría',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'OD4P2',
            'nombre'                => 'Endodoncia',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'OD4P3',
            'nombre'                => 'Farmacología',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'OD4P4',
            'nombre'                => 'Ortodoncia',
            'cantidad_hora'          => '75',
        ]);

        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'OD4P5',
            'nombre'                => 'Prevención de Riesgos y Primeros Auxilios en Odontología',
            'cantidad_hora'          => '75',
        ]);


    }
}
