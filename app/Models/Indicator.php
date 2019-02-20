<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Perspective;

class Indicator extends Model
{
  protected $table = 'indicators';

  protected $fillable = [
    'name', 'target', 'performance_threshold', 'is_active', 'perspective_id'
  ];

  public function perspective()
  {
    return $this->belongsTo(Perspective::class);
  }
}
