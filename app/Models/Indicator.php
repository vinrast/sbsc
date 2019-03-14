<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Taxonomy;
use App\Http\Traits\IndicatorsLimit;
use App\Models\HistoryIndicator;

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

  public function historyIndicators()
  {
    return $this->hasMany(HistoryIndicator::class);
  }

  public function getLimitAttribute()
  {
    return $this->getLimits($this->performance_threshold, $this->id)->getData();
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

  public function scopeforPerspective($query, $perspective){
    return $query->where('taxonomy_id', $perspective)
                 ->where('is_active', 1);
  }
}
