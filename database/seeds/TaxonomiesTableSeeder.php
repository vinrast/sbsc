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


    }
}
