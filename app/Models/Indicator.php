<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Taxonomy;
use App\Http\Traits\IndicatorsLimit;

class Indicator extends Model
{
  use IndicatorsLimit;

  protected $table = 'indicators';

  protected $fillable = [
    'name', 'target', 'performance_threshold', 'is_active', 'taxonomy_id', 'graphic_type'
  ];

  protected $appends = ['limit','threshold'];

  public function taxonomy()
  {
    return $this->belongsTo(Taxonomy::class);
  }

  public function getLimitAttribute()
  {
    return $this->getLimits($this)->getData();
  }

  public function getThresholdAttribute()
  {
    return $this->getInteger($this->performance_threshold);
  }

  public function scopeSearch($query, $data){
    if ($data !=0) {
      $query = $query->where('taxonomy_id', $data);
    }
    return $query;
  }
}
