<?php

use Illuminate\Database\Seeder;
use App\Models\Indicator;

class IndicatorsTableSeeder extends Seeder
{
    public function run()
    {

      // Indicadores de perspectiva clientes

        Indicator::create([
          'name'                  => 'Índice de Incorporación de Nuevos Clientes',
          'target'                => 'Medir la capacidad de expansión en el mercado',
          'performance_threshold' => 6,
          'is_active'             => 1,
          'taxonomy_id'           => 1,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Contratos perdidos por  precios',
          'target'                => 'Nro. De contratos perdidos respecto a la competencia',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 1,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Índice de Entrega Fuera de Plazo',
          'target'                => 'Fracción de entregas que se hacen fuera de plazo  programado',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 1,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Incremento de Facturación a Clientes Existentes',
          'target'                => 'Mide el aumento de facturación de un periodo a otro',
          'performance_threshold' => 5,
          'is_active'             => 1,
          'taxonomy_id'           => 1,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Índice de Rechazo de Cliente',
          'target'                => 'Coste monetario de las reclamaciones respecto a la facturación total',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 1,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Satisfacción del Cliente',
          'target'                => 'Muestra la puntuación obtenida en la encuesta de satisfacción del cliente',
          'performance_threshold' => 60,
          'is_active'             => 1,
          'taxonomy_id'           => 1,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Variacion de precios respecto a la competencia',
          'target'                => 'Muestra la variacion de precio de servicios respecto a la competencia',
          'performance_threshold' => -2,
          'is_active'             => 1,
          'taxonomy_id'           => 1,
          'graphic_type'          => 1
        ]);

          // Indicadores de perspectiva aprendizaje y conocimiento

        Indicator::create([
          'name'                  => 'Incorporación de Nuevos Servicios',
          'target'                => 'Mide la capacidad de ampliar servicios ofrecidos a los clientes de acuerdo a sus necesidades',
          'performance_threshold' => 14,
          'is_active'             => 1,
          'taxonomy_id'           => 2,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Índice de Creatividad',
          'target'                => 'Medir las sugerencias de calidad hechas por los empleados que serán evaluadas para la puesta en práctica',
          'performance_threshold' => 2,
          'is_active'             => 1,
          'taxonomy_id'           => 2,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Índice de Reclamos',
          'target'                => 'Mide el % de cantidad de reclamos que recibieron repuestas en cierto periodo',
          'performance_threshold' => 60,
          'is_active'             => 1,
          'taxonomy_id'           => 2,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Índice de Calidad',
          'target'                => 'Mide la satisfacción y la calidad de atención brindada por la organización a sus trabajadores',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 2,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Satisfacción de Empleados',
          'target'                => 'Conocer que opinión tienen de las condiciones de trabajo y ambientales de la organización',
          'performance_threshold' => 60,
          'is_active'             => 1,
          'taxonomy_id'           => 2,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Índice de ausentismo',
          'target'                => 'Medir el % de las horas de tiempo optimo en que el personal esta ausente',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 2,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Satisfacción de empleados con formación recibida',
          'target'                => 'Muestra la puntuación obtenida en la encuesta de satisfacción del empleado referente a la formación recibida',
          'performance_threshold' => 60,
          'is_active'             => 1,
          'taxonomy_id'           => 2,
          'graphic_type'          => 1
        ]);

        // Indicadores financieros

        Indicator::create([
          'name'                  => 'Rentabilidad operacional del patrimonio (ROE)',
          'target'                => 'Permite identificar la rentabilidad que la empresa le ofrece a los socios o accionistas en relación con el capital invertido en la organización',
          'performance_threshold' => 1.3,
          'is_active'             => 1,
          'taxonomy_id'           => 3,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Liquidez corriente',
          'target'                => 'Muestra la capacidad de pago de la organización a corto plazo',
          'performance_threshold' => 1.90,
          'is_active'             => 1,
          'taxonomy_id'           => 3,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Impacto de los gastos administrativos y de ventas',
          'target'                => 'Permite medir la carga de los gastos necesarios para ejecutar las ventas y determinar el nivel de las ventas durante cierto periodo',
          'performance_threshold' => 1,
          'is_active'             => 1,
          'taxonomy_id'           => 3,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Endeudamiento del Activo',
          'target'                => 'Mide el nivel de autonomía financiera. Si el resultado es elevado indica que la empresa depende de sus acreedores y dispone de una limitada capacidad de endeudamiento. Si el resultado es un un numero bajo, representa un elevado grado de independencia de la empresa frente a acreedores',
          'performance_threshold' => 2,
          'is_active'             => 1,
          'taxonomy_id'           => 3,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Endeudamiento patrimonial',
          'target'                => 'Mide el grado de compromiso del patrimonio para con los acreedores de la organización.',
          'performance_threshold' => 0.50,
          'is_active'             => 1,
          'taxonomy_id'           => 3,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Rentabilidad neta del activo (Dupont)',
          'target'                => 'Permite relacionar la rentabilidad de ventas y la rotación del activo total, identificando las áreas responsables del desempeño de la rentabilidad del activo',
          'performance_threshold' => 1.3,
          'is_active'             => 1,
          'taxonomy_id'           => 3,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Apalancamiento',
          'target'                => 'Mide el número de unidades monetarias de activos que se han conseguido por cada unidad monetaria de patrimonio',
          'performance_threshold' => 60,
          'is_active'             => 1,
          'taxonomy_id'           => 3,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Liquidez de creditos',
          'target'                => 'Muestra el número de días que transcurren desde que se efectua una venta hasta que ésta se cobra',
          'performance_threshold' => 80,
          'is_active'             => 1,
          'taxonomy_id'           => 3,
          'graphic_type'          => 0
        ]);

        // Indicadores de perspectiva proceso interno del negocio

        Indicator::create([
          'name'                  => 'Proyectos entregados fuera de calendario',
          'target'                => 'Muestra el número de pedidos que hace el cliente por cada visita hecha por el comercial',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 4,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Control y seguimiento de rupturas de stock',
          'target'                => 'Muestra el número de horas que una maquina ha estado parada por causas ligadas al mantenimiento.',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 4,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Incidencias por mal asesoramiento',
          'target'                => 'Muestra la fracción de problemas de funcionalidad que tienen origen por el mal asesoramiento por parte del comercial al cliente',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 4,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Entregas fuera de plazo',
          'target'                => 'Muestra el % de las entregas que no se entregan dentro de los plazos establecidos',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 4,
          'graphic_type'          => 0
        ]);

        Indicator::create([
          'name'                  => 'Numero de tratos y convenios logrados ',
          'target'                => 'Muestra el número de pedidos que hace el cliente por cada visita hecha por comercial',
          'performance_threshold' => 0,
          'is_active'             => 1,
          'taxonomy_id'           => 4,
          'graphic_type'          => 1
        ]);

        Indicator::create([
          'name'                  => 'Rendimiento de las maquinas ',
          'target'                => 'Muestra el grado de utilización de una maquina durante la ejecución ',
          'performance_threshold' => 60,
          'is_active'             => 1,
          'taxonomy_id'           => 4,
          'graphic_type'          => 1
        ]);


    }
}
