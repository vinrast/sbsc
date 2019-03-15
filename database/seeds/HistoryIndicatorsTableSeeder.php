<?php

use Illuminate\Database\Seeder;
use App\Models\HistoryIndicator;

class HistoryIndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      HistoryIndicator::create([
        'indicator_id'          => 1,
        'date'                  => '2019-01-01',
        'performance_threshold' => 6,
        'result'                => 6,
      ]);

      HistoryIndicator::create([
        'indicator_id'          => 1,
        'date'                  => '2019-02-01',
        'performance_threshold' => 6,
        'result'                => 6,
      ]);

      HistoryIndicator::create([
        'indicator_id'          => 1,
        'date'                  => '2019-03-01',
        'performance_threshold' => 6,
        'result'                => 12,
      ]);

      HistoryIndicator::create([
        'indicator_id'          => 1,
        'date'                  => '2019-04-01',
        'performance_threshold' => 6,
        'result'                => 2,
      ]);

      HistoryIndicator::create([
        'indicator_id'          => 1,
        'date'                  => '2019-05-01',
        'performance_threshold' => 6,
        'result'                => 4,
      ]);
    }
}
