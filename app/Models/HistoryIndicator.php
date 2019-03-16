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
    'id', 'indicator_id', 'date', 'performance_threshold', 'result'
  ];
  protected $dates = ['created_at', 'updated_at','date'];

  protected $appends = ['limit', 'threshold_format', 'result_format', 'label','title'];

  public function indicator()
  {
    return $this->belongsTo(Indicator::class);
  }

  public function getLimitAttribute()
  {
    return $this->getLimits($this->performance_threshold, $this->indicator_id)->getData();
  }

  public function getThresholdFormatAttribute()
  {
    return $this->getInteger($this->performance_threshold);
  }

  public function getResultFormatAttribute()
  {
    return $this->getInteger($this->result);
  }

  public function getLabelAttribute()
  {
    //dd($this->result_format);
    if( $this->indicator->graphic_type )
      if( $this->result_format <= $this->limit->negative ){
        $label = "<span class='label bg-red'>{$this->result_format}</span>";
      }elseif($this->result_format > $this->limit->average && $this->result_format <= $this->limit->positive  ){
        $label = "<span class='label bg-yellow'>{$this->result_format}</span>";
      }else{
        $label = "<span class='label bg-green'>{$this->result_format}</span>";
      }
    else{
      if( $this->result_format > $this->limit->negative ){
        $label = "<span class='label bg-red'>{$this->result_format}</span>";
      }elseif($this->result_format > $this->limit->positive  && $this->result_format <= $this->limit->negative  ){
        $label = "<span class='label bg-yellow'>{$this->result_format}</span>";
      }else{
        $label = "<span class='label bg-green'>{$this->result_format}</span>";
      }
    }

    return $label;
  }

  public function getTitleAttribute()
  {
    $negative = $this->indicator->graphic_type ? '<=' : '>';
    $positive = $this->indicator->graphic_type ? '>' : '<=';
    $title = "Umbral: {$this->threshold_format} <br>
              Negativo: <span class='label bg-red'> {$negative} ". $this->limit->negative . "</span> <br>
              Esperado: <span class='label bg-yellow'> > ". $this->limit->average . "</span> <br>
              Positivo: <span class='label bg-green'> {$positive} ". $this->limit->positive . "</span> <br>";

    return $title;
  }

  public function scopeSearch($query, $array, $year){
    return $query->whereIn('indicator_id',$array)
                 ->whereBetween('date', ["{$year}-01-01","{$year}-12-01"])
                 ->get();
  }

}
