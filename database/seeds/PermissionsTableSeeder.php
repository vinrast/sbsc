<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
          'name'        => 'Dashboard',
          'slug'        => 'home',
          'description' => 'Home de la aplicacion'
        ]);

        Permission::create([
          'name'        => 'Ajustes',
          'slug'        => 'ajustes',
          'description' => 'configuracion general de la aplicacion'
        ]);

        Permission::create([
          'name'        => 'Departamentos',
          'slug'        => 'ajustes.departamentos',
          'description' => 'configuracion de los departamentos de la empresa'
        ]);

        Permission::create([
          'name'        => 'Crear Departamentos',
          'slug'        => 'ajustes.departamentos.crear',
          'description' => 'crear departamentos'
        ]);

        Permission::create([
          'name'        => 'Editar Departamentos',
          'slug'        => 'ajustes.departamentos.editar',
          'description' => 'Editar departamentos'
        ]);

        Permission::create([
          'name'        => 'Eliminar Departamentos',
          'slug'        => 'ajustes.departamentos.eliminar',
          'description' => 'Eliminar departamentos'
        ]);

        Permission::create([
          'name'        => 'Roles',
          'slug'        => 'ajustes.roles',
          'description' => 'configuracion de los roles de la aplicacion'
        ]);

        Permission::create([
          'name'        => 'Crear Roles',
          'slug'        => 'ajustes.roles.crear',
          'description' => 'crear roles'
        ]);

        Permission::create([
          'name'        => 'Editar Roles',
          'slug'        => 'ajustes.roles.editar',
          'description' => 'Editar roles'
        ]);

        Permission::create([
          'name'        => 'Eliminar Roles',
          'slug'        => 'ajustes.roles.eliminar',
          'description' => 'Eliminar roles'
        ]);

        Permission::create([
          'name'        => 'Usuarios',
          'slug'        => 'ajustes.usuarios',
          'description' => 'configuracion de los usuarios de la aplicacion'
        ]);

        Permission::create([
          'name'        => 'Crear Usuarios',
          'slug'        => 'ajustes.usuarios.crear',
          'description' => 'crear usuarios'
        ]);

        Permission::create([
          'name'        => 'Editar Usuarios',
          'slug'        => 'ajustes.usuarios.editar',
          'description' => 'Editar usuarios'
        ]);

        Permission::create([
          'name'        => 'Eliminar Usuarios',
          'slug'        => 'ajustes.usuarios.eliminar',
          'description' => 'Eliminar usuarios'
        ]);

        Permission::create([
          'name'        => 'Indicadores',
          'slug'        => 'ajustes.indicadores',
          'description' => 'configuracion de los KPI que estaran disponibles dentro de la aplicacion'
        ]);

        Permission::create([
          'name'        => 'Editar Indicadores',
          'slug'        => 'ajustes.indicadores.editar',
          'description' => 'Editar los umbrales de los KPI que estaran disponibles dentro de la aplicacion'
        ]);

        Permission::create([
          'name'        => 'Activar Indicadores',
          'slug'        => 'ajustes.indicadores.activar',
          'description' => 'Activar o desactivar los KPI que estaran disponibles dentro de la aplicacion'
        ]);

        Permission::create([
          'name'        => 'Clientes',
          'slug'        => 'clientes',
          'description' => 'Cargar los valores de los indicadores de la perspectiva finanzas'
        ]);

        Permission::create([
          'name'        => 'Finanzas',
          'slug'        => 'finanzas',
          'description' => 'Cargar los valores de los indicadores de la perspectiva finanzas'
        ]);

        Permission::create([
          'name'        => 'Procesos Internos',
          'slug'        => 'procesos-internos',
          'description' => 'Cargar los valores de los indicadores de la perspectiva procesos internos'
        ]);

        Permission::create([
          'name'        => 'Aprendizaje y Conocimiento',
          'slug'        => 'aprendizaje',
          'description' => 'Cargar los valores de los indicadores de la perspectiva aprendizaje y conocimiento'
        ]);

        Permission::create([
          'name'        => 'Auditoria',
          'slug'        => 'auditoria',
          'description' => 'Visualizar todas las operiaciones realizadas dentro del sistema'
        ]);

        Permission::create([
          'name'        => 'Dashboard enlaces',
          'slug'        => 'dasboard.accesos',
          'description' => 'Visualizar los accesos directos del dashboard al resto de la apliacion'
        ]);
    }
}
