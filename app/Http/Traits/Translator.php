<?php

namespace App\Http\Traits;

trait Translator
{

  public function dayTranslator($day)
  {
    $dayCollection = [
      'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'
    ];

    return $dayCollection[$day-1];
  }

  public function monthTranslator($month)
  {
    $monthCollection = [
      'Enero', 'Febrero', 'Márzo', 'Abril', 'Mayo', 'Junio', 'Júlio','Agosto',
      'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ];

    return $monthCollection[$month-1];
  }

}
