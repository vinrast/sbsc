<?php

use Illuminate\Database\Seeder;
use App\Models\Taxonomy;

class TaxonomiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Taxonomy::create([
        'name'   => 'Clientes',
        'family' => 1
      ]);

      Taxonomy::create([
        'name'   => 'Aprendizaje y Conocimiento',
        'family' => 1
      ]);

      Taxonomy::create([
        'name'   => 'Finanzas',
        'family' => 1
      ]);

      Taxonomy::create([
        'name'   => 'Proceso Interno del Negocio',
        'family' => 1
      ]);

      Taxonomy::create([
        'name'   => 'Inicio de Sesión',
        'family' => 2
      ]);

      Taxonomy::create([
        'name'   => 'Creación',
        'family' => 2
      ]);

      Taxonomy::create([
        'name'   => 'Actualización',
        'family' => 2
      ]);

      Taxonomy::create([
        'name'   => 'Borrado',
        'family' => 2
      ]);

      Taxonomy::create([
        'name'   => 'Departamentos',
        'family' => 3
      ]);

      Taxonomy::create([
        'name'   => 'Roles',
        'family' => 3
      ]);

      Taxonomy::create([
        'name'   => 'Usuarios',
        'family' => 3
      ]);

      Taxonomy::create([
        'name'   => 'Indicadores',
        'family' => 3
      ]);

      Taxonomy::create([
        'name'   => 'Historial Indicadores',
        'family' => 3
      ]);

    }
}
