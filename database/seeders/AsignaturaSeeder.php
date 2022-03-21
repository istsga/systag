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
            'nombre'                => 'Matemática',
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
            'periodo_id'            => '4',
            'cod_asignatura'        => 'DS4T5',
            'nombre'                => 'Modalidad de Titulación',
            'cantidad_hora'          => '40',
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
        Asignatura::create([
            'carrera_id'            => '1',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'DS5T5',
            'nombre'                => 'Trabajo de Titulación',
            'cantidad_hora'          => '50',
        ]);

    //CONTABILIDAD

        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-B-01-002',
        'nombre'                    => 'Etnia, Género y Saberes Ancestrales',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-B-01-001',
        'nombre'                    => 'Técnicas de Expresión Oral y Escrita',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-P-01-003',
        'nombre'                    => 'Matemática Financiera I',
        'cantidad_hora'             => '60',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-P-01-004',
        'nombre'                    => 'Redacción Mercantíl',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-P-01-005',
        'nombre'                    => 'Contabilidad Básica',
        'cantidad_hora'             => '80',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '1',
        'cod_asignatura'            => 'CONT-P-01-006',
        'nombre'                    => 'Informática Media',
        'cantidad_hora'             => '60',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-B-02-001',
        'nombre'                    => 'Metodología de la Investigación',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-002',
        'nombre'                    => 'Ley de Companías',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-003',
        'nombre'                    => 'Derecho Laboral',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-004',
        'nombre'                    => 'Microeconomía',
        'cantidad_hora'             => '60',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-005',
        'nombre'                    => 'Matemática Financiera II',
        'cantidad_hora'             => '60',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '2',
        'cod_asignatura'            => 'CONT-P-02-006',
        'nombre'                    => 'Contabilidad General',
        'cantidad_hora'             => '80',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-B-03-001',
        'nombre'                    => 'Estadística I',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-002',
        'nombre'                    => 'Administración de Empresas',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-003',
        'nombre'                    => 'Derecho Tributario',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-004',
        'nombre'                    => 'Contabilidad Comercial',
        'cantidad_hora'             => '80',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-005',
        'nombre'                    => 'Contabilidad de Costos I',
        'cantidad_hora'             => '80',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '3',
        'cod_asignatura'            => 'CONT-P-03-006',
        'nombre'                    => 'Macroeconomía',
        'cantidad_hora'             => '60',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-B-04-001',
        'nombre'                    => 'Estadística II',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-P-04-002',
        'nombre'                    => 'Presupuestos',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-P-04-003',
        'nombre'                    => 'Análisis Finciero',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-P-04-004',
        'nombre'                    => 'Contabilidad de Costos II',
        'cantidad_hora'             => '80',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-P-04-005',
        'nombre'                    => 'Aplicaciones Tributarias',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '4',
        'cod_asignatura'            => 'CONT-T-04-006',
        'nombre'                    => 'Modalidad de Titulación',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-B-05-001',
        'nombre'                    => 'Ética Profesional Social y Personal',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-B-05-002',
        'nombre'                    => 'Gestión de Talento Humano',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-P-05-003',
        'nombre'                    => 'Contabilidad Finaciera ',
        'cantidad_hora'             => '60',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-B-05-004',
        'nombre'                    => 'Contabilidad Gubernamental',
        'cantidad_hora'             => '80',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-B-05-005',
        'nombre'                    => 'Paquetes Contables',
        'cantidad_hora'             => '40',
        ]);
        Asignatura::create([
        'carrera_id'                => '2',
        'periodo_id'                => '5',
        'cod_asignatura'            => 'CONT-T-05-006',
        'nombre'                    => 'Trabajo de Titulación',
        'cantidad_hora'             => '60',
        ]);

        //ENFERMERÍA
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ME-FEN-110',
            'nombre'                => 'Enfermería Básica',
            'cantidad_hora'         => '180',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ME-MFL-110',
            'nombre'                => 'Morfofisiología Humana I',
            'cantidad_hora'         => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ME-CL-110',
            'nombre'                => 'Comunicación e Interacción Humana',
            'cantidad_hora'         => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ME-BCS-110',
            'nombre'                => 'Bioética en Enfermería ',
            'cantidad_hora'         => '180',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ME-DPS-110',
            'nombre'                => 'Desarrollo Personal, Social y Deportivo',
            'cantidad_hora'         => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ME-BIQ-110',
            'nombre'                => 'Bioquímica',
            'cantidad_hora'         => '80',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ME-EPR-210',
            'nombre'                => 'Enfermería Básica II',
            'cantidad_hora'         => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ME-FH-210',
            'nombre'                => 'Morfofisiología Humana II',
            'cantidad_hora'         => '140',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ME-FNH-210',
            'nombre'                => 'Nutrición y Dietética',
            'cantidad_hora'         => '90',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ME-MYP-210',
            'nombre'                => 'Microbiología y Parasitología',
            'cantidad_hora'         => '90',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ME-EIPDF-210',
            'nombre'                => 'Enfermería en Salud Mental y Gestión de los Cuidados Paleativos',
            'cantidad_hora'         => '140',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ME-MTIC-310',
            'nombre'                => 'TISC Aplicadas en Enfermería',
            'cantidad_hora'         => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ME-EIFC-310',
            'nombre'                => 'Enfermería Familiar y Comunitaria',
            'cantidad_hora'         => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ME-FIP-310',
            'nombre'                => 'Fisiopatología',
            'cantidad_hora'         => '160',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ME-FCE-310',
            'nombre'                => 'Farmacología General y Aplicada',
            'cantidad_hora'         => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ME-ECP-310',
            'nombre'                => 'Estudio y Compresión de la Población',
            'cantidad_hora'         => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ME-EIFC-210',
            'nombre'                => 'Administración y Gestion de los Servicios de Enfermería',
            'cantidad_hora'         => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ME-IINV-410',
            'nombre'                => 'Introducción a la Investigación',
            'cantidad_hora'         => '80',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ME-MTA-510',
            'nombre'                => 'Terapias y Alternativas Ancestrales',
            'cantidad_hora'         => '80',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ME-EISR-410',
            'nombre'                => 'Salud Sexual y Reproductiva',
            'cantidad_hora'         => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ME-EINA-410',
            'nombre'                => 'Enfermaría Materno Infantil y del Adolecente',
            'cantidad_hora'         => '80',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ME-GAPS-410',
            'nombre'                => 'Estrategias de APS',
            'cantidad_hora'         => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ME-AM-410',
            'nombre'                => 'Administración de Medicamentos',
            'cantidad_hora'         => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '3',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ME-TT-411',
            'nombre'                => 'Opción de titulación',
            'cantidad_hora'         => '200',
        ]);

//ODONTOLOGÍA
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ITSGA-TSO-01',
            'nombre'                => 'Ética Profesional',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ITSGA-TSO-02',
            'nombre'                => 'TICS en Odontología',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ITSGA-TSO-03',
            'nombre'                => 'Étia Género y Saberes Ancestrales',
            'cantidad_hora'          => '70',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ITSGA-TSO-04',
            'nombre'                => 'Comunicación e Interacción Humana',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ITSGA-TSO-05',
            'nombre'                => 'Morfofisiología del Cuerpo Humano',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'ITSGA-TSO-06',
            'nombre'                => 'Odontología General',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ITSGA-TSO-07',
            'nombre'                => 'Metodología de la Investigación',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ITSGA-TSO-08',
            'nombre'                => 'Materiales Dentales',
            'cantidad_hora'          => '70',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ITSGA-TSO-09',
            'nombre'                => 'Educación Para la Salud',
            'cantidad_hora'          => '50',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ITSGA-TSO-10',
            'nombre'                => 'Morfofisiología Bucal',
            'cantidad_hora'          => '160',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ITSGA-TSO-11',
            'nombre'                => 'Patología Dental Prevalente',
            'cantidad_hora'          => '140',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'ITSGA-TSO-12',
            'nombre'                => 'Normas de Bioseguridad Esterilización y Trabajos a 4 Manos',
            'cantidad_hora'          => '150',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ITSGA-TSO-13',
            'nombre'                => 'Administración de Clínica o Consultorio Dental',
            'cantidad_hora'          => '60',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ITSGA-TSO-14',
            'nombre'                => 'Prostodoncia',
            'cantidad_hora'         => '130',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ITSGA-TSO-15',
            'nombre'                => 'Periodoncia',
            'cantidad_hora'          => '130',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ITSGA-TSO-16',
            'nombre'                => 'Operatoria Dental',
            'cantidad_hora'          => '90',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ITSGA-TSO-17',
            'nombre'                => 'Estética Dental',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'ITSGA-TSO-18',
            'nombre'                => 'Cirugía y Radiología Dental',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ITSGA-TSO-19',
            'nombre'                => 'Odontopediatría',
            'cantidad_hora'          => '90',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ITSGA-TSO-20',
            'nombre'                => 'Endodoncia',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ITSGA-TSO-21',
            'nombre'                => 'Farmacología',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ITSGA-TSO-22',
            'nombre'                => 'Ortodoncia',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ITSGA-TSO-23',
            'nombre'                => 'Prevención de Riesgos y Primeros Auxilios en Odontología',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '4',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'ITSGA-TT-24',
            'nombre'                => 'Titulación',
            'cantidad_hora'          => '100',
        ]);
    //CUIDADO CANINO
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'C-CANINO-001',
            'nombre'                => 'Comunicación e Interacción Humana',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'C-CANINO-002',
            'nombre'                => 'Matemáticas',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'C-CANINO-003',
            'nombre'                => 'Etnia, Género y Saberes Ancestrales',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'C-CANINO-004',
            'nombre'                => 'Anatomía Animal',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'C-CANINO-005',
            'nombre'                => 'Biología',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'C-CANINO-006',
            'nombre'                => 'Informática Básica',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'C-CANINO-007',
            'nombre'                => 'Metodología de la Investigación',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'C-CANINO-008',
            'nombre'                => 'Histología Veterinaria',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'C-CANINO-009',
            'nombre'                => 'Fisiología Animal',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'C-CANINO-010',
            'nombre'                => 'Parasitología I',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'C-CANINO-011',
            'nombre'                => 'Bioquímica Veterinaria',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'C-CANINO-012',
            'nombre'                => 'Microbiología Veterinaria',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'C-CANINO-013',
            'nombre'                => 'Ecología',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'C-CANINO-014',
            'nombre'                => 'Enfermedades Infecciosas',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'C-CANINO-015',
            'nombre'                => 'Estética y Cuidado Canino I',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'C-CANINO-016',
            'nombre'                => 'Parasitología II',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'C-CANINO-017',
            'nombre'                => 'Farmacología Veterinaria',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'C-CANINO-018',
            'nombre'                => 'Clínica Menor I',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'C-CANINO-019',
            'nombre'                => 'Emprendimiento',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'C-CANINO-020',
            'nombre'                => 'Nutrición de Pequeñas Especies',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'C-CANINO-021',
            'nombre'                => 'Estética y Cuidado Canino II',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'C-CANINO-022',
            'nombre'                => 'Cirugía',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'C-CANINO-023',
            'nombre'                => 'Clínica Menor II',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'C-CANINO-024',
            'nombre'                => 'Opcíon de Titulación I',
            'cantidad_hora'          => '80',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'C-CANINO-025',
            'nombre'                => 'Etología y Bienestar Animal',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'C-CANINO-026',
            'nombre'                => 'Genética Animal',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'C-CANINO-027',
            'nombre'                => 'Estética y Cuidado Canino III',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'C-CANINO-028',
            'nombre'                => 'Adiestramiento',
            'cantidad_hora'          => '110',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'C-CANINO-029',
            'nombre'                => 'Reproducción de Pequeñas Especies',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '5',
            'periodo_id'            => '5',
            'cod_asignatura'        => 'C-CANINO-030',
            'nombre'                => 'Opción de Titulación II ',
            'cantidad_hora'          => '80',
        ]);
    //EMERGENCIAS MEDICAS
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'E-MEDICAS-001',
            'nombre'                => 'Comunicación e Interacción Humana',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'E-MEDICAS-002',
            'nombre'                => 'Etnia, Género y Saberes Ancestrales',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'E-MEDICAS-003',
            'nombre'                => 'Informática Media',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'E-MEDICAS-004',
            'nombre'                => 'Morfofisiología',
            'cantidad_hora'          => '220',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'E-MEDICAS-005',
            'nombre'                => 'Psicología Aplicada',
            'cantidad_hora'          => '220',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '1',
            'cod_asignatura'        => 'E-MEDICAS-006',
            'nombre'                => 'Primero Auxilios',
            'cantidad_hora'          => '220',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'E-MEDICAS-007',
            'nombre'                => 'Ética Profesional',
            'cantidad_hora'          => '70',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'E-MEDICAS-008',
            'nombre'                => 'Gestión de Riesgos',
            'cantidad_hora'          => '70',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'E-MEDICAS-009',
            'nombre'                => 'Fisiopatología',
            'cantidad_hora'          => '190',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'E-MEDICAS-010',
            'nombre'                => 'Semiología',
            'cantidad_hora'          => '190',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'E-MEDICAS-011',
            'nombre'                => 'Manejo del Trauma y Soporte Vital Básico',
            'cantidad_hora'          => '170',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '2',
            'cod_asignatura'        => 'E-MEDICAS-012',
            'nombre'                => 'Técnicas de Rescate',
            'cantidad_hora'          => '170',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'E-MEDICAS-013',
            'nombre'                => 'Farmacología',
            'cantidad_hora'          => '80',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'E-MEDICAS-014',
            'nombre'                => 'Manejo y Traslado del Paciente',
            'cantidad_hora'          => '170',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'E-MEDICAS-015',
            'nombre'                => 'Manejo del Trauma y Soporte Vital Avanzado',
            'cantidad_hora'          => '170',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'E-MEDICAS-016',
            'nombre'                => 'Emergencias Cardiovasculares',
            'cantidad_hora'          => '170',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'E-MEDICAS-017',
            'nombre'                => 'Procedimiento de Cirugía Menor',
            'cantidad_hora'          => '160',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '3',
            'cod_asignatura'        => 'E-MEDICAS-018',
            'nombre'                => 'Opción de Titulación I',
            'cantidad_hora'          => '100',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'E-MEDICAS-019',
            'nombre'                => 'Emergencias Clínicas',
            'cantidad_hora'          => '170',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'E-MEDICAS-020',
            'nombre'                => 'Emergencias Pediátricas',
            'cantidad_hora'          => '170',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'E-MEDICAS-021',
            'nombre'                => 'Emergencias Gineco-Obstetricas',
            'cantidad_hora'          => '160',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'E-MEDICAS-022',
            'nombre'                => 'Emergencias Toxicológicas',
            'cantidad_hora'          => '140',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'E-MEDICAS-023',
            'nombre'                => 'Comunidad Desastres y Salud',
            'cantidad_hora'          => '120',
        ]);
        Asignatura::create([
            'carrera_id'            => '6',
            'periodo_id'            => '4',
            'cod_asignatura'        => 'E-MEDICAS-024',
            'nombre'                => 'Opción de Titulación II',
            'cantidad_hora'          => '100',
        ]);
    }
}
