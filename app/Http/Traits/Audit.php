<?php

namespace App\Http\Traits;

use App\Models\Audit as ModelAudit;

trait Audit
{
  public function creations($place, $user, $register)
  {
    ModelAudit::create([
      'action_id' => 6,
      'place_id'  => $place,
      'user'      => $user,
      'register'  => $register
    ]);
  }

  public function updates($place, $user, $register, $values)
  {
    $test = '';
    foreach ($values as $key => $value) {
      if ($key !== 'updated_at') {
        $test .= $key.": ".$value."<br>";
      }
    }


    ModelAudit::create([
      'action_id'      => 7,
      'place_id'       => $place,
      'user'           => $user,
      'register'       => $register,
      'update_values'  => $test
    ]);
  }

  public function destroyed($place, $user, $register)
  {
    ModelAudit::create([
      'action_id'      => 8,
      'place_id'       => $place,
      'user'           => $user,
      'register'       => $register
    ]);
  }
}
