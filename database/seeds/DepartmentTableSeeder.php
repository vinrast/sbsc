<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Department::create([
        'name'  => 'Desarrollo de Sistemas',
      ]);

      Department::create([
        'name'  => 'Recursos Humanos',
      ]);
    }
}
