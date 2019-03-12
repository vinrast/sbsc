<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait IndicatorTools
{
  public function getArrayIds($indicators_id)
  {
    foreach ($indicators_id  as $indicators_id_array){
      $array[] = $indicators_id_array;
    }
    return $array;
  }

  public function getFiveLastYears()
  {
    return range(Carbon::now()->year, Carbon::now()->subYears(5)->year);
  }

}
