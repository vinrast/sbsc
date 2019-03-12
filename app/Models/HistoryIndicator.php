<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Indicator;
use App\Http\Traits\IndicatorsLimit;

class HistoryIndicator extends Model
{
  use IndicatorsLimit;

  protected $table = 'history_indicators';

  protected $fillable = [
    'id', 'indicator_id', 'date', 'performance_threshold'
  ];
  protected $dates = ['created_at', 'updated_at','date'];

  protected $appends = ['limit', 'threshold_format', 'result_format'];

  public function indicator()
  {
    return $this->belongsTo(Indicator::class);
  }

  public function getLimitAttribute()
  {
    return $this->getLimits($this->indicator)->getData();
  }

  public function getThresholdFormatAttribute()
  {
    return $this->getInteger($this->performance_threshold);
  }

  public function getResultFormatAttribute()
  {
    return $this->getInteger($this->result);
  }

  public function scopeSearch($query, $array, $year){
    return $query->whereIn('indicator_id',$array)
                 ->whereBetween('date', ["{$year}-01-01","{$year}-12-01"])
                 ->get();
  }

}
