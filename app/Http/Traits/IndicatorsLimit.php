<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait IndicatorsLimit
{

  public function getPercents($indicator_id)
  {
    $percents =[
      // Clientes
      (object)['negative' => 66.67, 'average' => 66.67, 'positive' => 116.67],
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 60, 'average' => 80, 'positive' => 140],
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 68.33, 'average' => 68.33, 'positive' => 100],
      (object)['negative' => -300, 'average' => -300, 'positive' => 250],
      // Aprendizaje y Conocimiento
      (object)['negative' => 78.57, 'average' => 78.57, 'positive' => 142.85],
      (object)['negative' => 55, 'average' => 55, 'positive' => 100],
      (object)['negative' => 68.33, 'average' => 68.33, 'positive' => 100],
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 68.33, 'average' => 68.33, 'positive' => 100],
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 68.33, 'average' => 68.33, 'positive' => 100],
      // Finanzas
      (object)['negative' => 84.61, 'average' => 84.61, 'positive' => 153.84],
      (object)['negative' => 57.89, 'average' => 57.89, 'positive' => 100],
      (object)['negative' => 150, 'average' => 100, 'positive' => 100],
      (object)['negative' => 50, 'average' => 50, 'positive' => 100],
      (object)['negative' => 120, 'average' => 100, 'positive' => 100],
      (object)['negative' => 84.61, 'average' => 84.61, 'positive' => 153.84],
      (object)['negative' => 250, 'average' => 83.33, 'positive' => 83.33],
      (object)['negative' => 187.5, 'average' => 125, 'positive' =>125],
      // Proceso interno del negocio
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 200, 'average' => 100, 'positive' => 100],
      (object)['negative' => 68.33, 'average' => 68.33, 'positive' => 100],
    ];

    return $percents[$indicator_id-1];
  }

  public function getLimits($indicator)
  {
    $negative = $this->limits($indicator, $this->getPercents($indicator->id)->negative);
    $average  = $this->limits($indicator, $this->getPercents($indicator->id)->average);
    $positive = $this->limits($indicator, $this->getPercents($indicator->id)->positive);

    return response()->json(['negative' => $this->getInteger($negative),
                             'average' => $this->getInteger($average),
                             'positive' => $this->getInteger($positive)]);
  }

  public function getInteger($value)
  {
    return (fmod($value, 1) !== 0.00) ? $value : (int)$value;
  }

  public function limits($indicator,$percent)
  {
    $threshold = $indicator->performance_threshold == 0 ? 1 : $indicator->performance_threshold;
    return number_format($threshold * $percent / 100,2,'.','');
  }
}
