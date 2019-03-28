<?php

use Illuminate\Database\Seeder;
use App\Models\SidebarLink;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      SidebarLink::create([
        'name'          => 'Dashboard',
        'url'           => '/inicio',
        'icon'          => 'fa fa-dashboard',
        'family'        => '1',
        'parent'        => 0,
        'permission_id' => 1
      ]);

      SidebarLink::create([
        'name'          => 'Ajustes',
        'url'           => '#',
        'icon'          => 'fa fa-cog',
        'family'        => '0',
        'parent'        => 0,
        'permission_id' => 2
      ]);

      SidebarLink::create([
        'name'          => 'Departamentos',
        'url'           => 'ajustes/departamentos',
        'icon'          => 'fa fa-laptop',
        'family'        => '2',
        'parent'        => 2,
        'permission_id' => 3
      ]);

      SidebarLink::create([
        'name'          => 'Roles',
        'url'           => 'ajustes/roles',
        'icon'          => 'fa fa-id-card',
        'family'        => '2',
        'parent'        => 2,
        'permission_id' => 7
      ]);

      SidebarLink::create([
        'name'          => 'Usuarios',
        'url'           => 'ajustes/usuarios',
        'icon'          => 'fa fa-user',
        'family'        => '2',
        'parent'        => 2,
        'permission_id' => 11
      ]);

      SidebarLink::create([
        'name'          => 'Indicadores',
        'url'           => 'ajustes/indicadores',
        'icon'          => 'fa fa-pie-chart',
        'family'        => '2',
        'parent'        => 2,
        'permission_id' => 15
      ]);

      SidebarLink::create([
        'name'          => 'Clientes',
        'url'           => 'clientes',
        'icon'          => 'fa fa-user',
        'family'        => '1',
        'parent'        => 0,
        'permission_id' => 17
      ]);

      SidebarLink::create([
        'name'          => 'Finanzas',
        'url'           => 'finanzas',
        'icon'          => 'fa fa-university',
        'family'        => '1',
        'parent'        => 0,
        'permission_id' => 21
      ]);

      SidebarLink::create([
        'name'          => 'Procesos Internos',
        'url'           => 'procesos-internos',
        'icon'          => 'fa fa-spinner',
        'family'        => '1',
        'parent'        => 0,
        'permission_id' => 24
      ]);

      SidebarLink::create([
        'name'          => 'Aprendizaje y Conocimiento',
        'url'           => 'aprendizaje',
        'icon'          => 'fa fa-book',
        'family'        => '1',
        'parent'        => 0,
        'permission_id' => 27
      ]);

      SidebarLink::create([
        'name'          => 'Auditoria',
        'url'           => 'auditoria',
        'icon'          => 'fa fa-search',
        'family'        => '1',
        'parent'        => 0,
        'permission_id' => 30
      ]);
    }
}
