<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;
use App\Models\HistoryIndicator;
use App\User;
use App\Models\Department;
use App\Models\Audit;
use App\Http\Traits\IndicatorsLimit;

class HomeController extends Controller
{
    use IndicatorsLimit;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home')->with([
                                    'indicators'     => Indicator::actives(),
                                    'indicatorsAll'  => Indicator::all(),
                                    'users'          => User::all(),
                                    'departments'    => Department::all(),
                                    'audit'          => Audit::where('action_id', 8)->get()
                                  ]);
    }

    public function getYearsIndicators(Indicator $indicator)
    {
      $registers = HistoryIndicator::where('indicator_id', $indicator->id)->get();
      return $this->getArrayYears($registers);
    }

    public function generateCharts(Request $request)
    {
      $this->getValidation($request);

      $registers = HistoryIndicator::whereBetween('date', ["{$request->input_2}-01-01","{$request->input_2}-12-01"])
                                   ->where('indicator_id',$request->input_1)
                                   ->get();

      $graphic_1 = $this->getDataGraphic_1($registers);
      $graphic_1['indicator'] = Indicator::where('id',$request->input_1)->pluck('name')->first();
      $graphic_1['year'] = $request->input_2;

      $graphic_2 = $this->formatGraphicData($this->getDataGraphic_2($registers), $request);
      $graphic_2['indicator'] = $graphic_1['indicator'];

      return response()->json([$graphic_1, $graphic_2]);
    }

    protected function formatGraphicData($data,$request)
    {
      $graphic_type = Indicator::where('id', $request->input_1)->pluck('graphic_type')->first();
      $graphic_color = ['#55BF3B','#DF5353'];
      $final = max($data) + 5;
      $range_initial = ['from'   => 0,
                        'to'     => $data['avg'],
                        'color'  => $graphic_color[$graphic_type] ];

      $range_medium = ['from'  => $data['avg'],
                       'to'     => !$graphic_type ? $data['avgNegative'] : $data['avgPositive'] ,
                       'color'  => '#DDDF0D' ];

      $range_final = ['from'  => !$graphic_type ? $data['avgNegative'] : $data['avgPositive'] ,
                      'to'     => $final,
                      'color'  => $graphic_color[!$graphic_type] ];

      $avg_result = (float)$this->getInteger($data['avgResult']);
      return compact('range_initial','range_medium','range_final','avg_result','final');
    }

    protected function getDataGraphic_2($registers)
    {
      $avgResult = 0;
      $avgNegative = 0;
      $avg = 0;
      $avgPositive = 0;
      foreach ($registers as $register) {
        $avgResult+= $register->result_format;
        $avgNegative+= $register->limit->negative;
        $avg+= $register->limit->average;
        $avgPositive+= $register->limit->positive;
      }

      $avgResult = $avgResult/$registers->count();
      $avgNegative = $avgNegative/$registers->count();
      $avg = $avg/$registers->count();
      $avgPositive = $avgPositive/$registers->count();

      return compact('avgResult','avgNegative','avg','avgPositive');
    }

    protected function getDataGraphic_1($registers)
    {
      for ($i=1; $i < 13 ; $i++) {
        $index[$i]  = null;
        $thresholds[$i]= null;
      }

      foreach ($registers as $register) {
        if(array_key_exists ( (int)$register->date->format('m') , $index )){
          $index[(int)$register->date->format('m')] = (float)$this->getInteger($register->result_format);
          $thresholds[(int)$register->date->format('m')] = (float)$this->getInteger($register->threshold_format);
        }
      }

      return compact('index','thresholds');
    }

    protected function getArrayYears($registers)
    {
      $years = [];
      foreach($registers as $register)
      {
        if (!in_array($register->date->format('Y'), $years)){
          $years[] = $register->date->format('Y');
        }
      }
      return $years;
    }

    protected function getValidation($request)
    {
      $request->validate([
        'input_1' => 'required',
        'input_2' => 'required',
      ]);
    }


}
