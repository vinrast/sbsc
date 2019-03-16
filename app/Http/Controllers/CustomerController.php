<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;
use App\Models\HistoryIndicator;
use Carbon\Carbon;
use App\Http\Traits\IndicatorTools;
use App\Http\Traits\Translator;

class CustomerController extends Controller
{
  use IndicatorTools, Translator;

    public function index(Request $request)
    {
      return view('perspectives.customers.index')
            ->with(['indicators' => Indicator::forPerspective(1)->get(),
                    'years'      => $this->getFiveLastYears(),
                    'registers'  => HistoryIndicator::search($this->getArrayIds(Indicator::forPerspective(1)->pluck('id')), $request->has('search') ? $request->search : Carbon::now()->format('Y')),
                    'search'     => $request->has('search') ? $request->search : null
                  ]);
    }

    public function new(Request $request, Indicator $indicator)
    {
      $time = strtotime("{$request->year}-{$request->month}-01");
      $newformat = date('Y-m',$time);

      if ($newformat > date('Y-m')) {
        abort(412, 'date higher than current date');
      }

      return [$indicator->name, $this->monthTranslator($request->month),
              "{$request->year}-{$request->month}-01", $indicator->id,
              $indicator->performance_threshold, $indicator->inputs_type
              ];
    }

    public function storage(Request $request)
    {
      $this->validateData($request);
      $query = HistoryIndicator::where('indicator_id', $request->indicator)
                                  ->where('date', $request->date)
                                  ->first();

      $register = $this->updateOrCreate($query, $request);

      return [$register, $register->date->format('m'),$this->monthTranslator($register->date->format('m'))];
    }

    public function updateOrCreate($query, $request)
    {
      $result = $this->getResult($request);

      if ($query) {
         $query->update([
           'result' => $result
         ]);

        $query = $query;
      } else {
        $query = HistoryIndicator::create([
          'indicator_id' => $request->indicator,
          'date' => $request->date,
          'performance_threshold' => $request->threshold,
          'result' => $result
        ]);
      }

      return $query;
    }

    public function getResult($request)
    {
      if ($request->formula_type == 1) {
        $result = $this->formula_1($request->input_1, $request->input_2);
      }elseif ($request->formula_type == 2) {
        $result = $this->formula_2($request->input_1);
      }elseif ($request->formula_type == 3) {
        $result = $this->formula_3($request->input_1, $request->input_2);
      }elseif ($request->formula_type == 4){
        $result = $this->formula_4($request->input_1, $request->input_2);
      }

      return $result;
    }

    public function formula_1($a, $b)
    {
      return ($a/$b)*100;
    }

    public function formula_2($a)
    {
      return (int)$a;
    }

    public function formula_3($a, $b)
    {
      return ($a-1) * 100 /$b;
    }

    public function formula_4($a, $b)
    {
      return ($a/$b)*365;
    }


    public function validateData(Request $request)
    {
      $request->validate([
        'input_1' => 'required|numeric|min:0',
        'input_2' => $request->has('input_2') ? 'required|numeric|min:0' : 'nullable',
      ]);
    }

    public function search(Request $request)
    {
      $register = HistoryIndicator::where('date', "{$request->year}-{$request->month}-01")
                                  ->where('indicator_id', $request->indicator)
                                  ->first();

      return [$register->id, $register->indicator->name, $this->monthTranslator($register->date->format('m'))];
    }

    public function destroy(HistoryIndicator $indicator)
    {
      HistoryIndicator::destroy($indicator->id);

      return [$indicator->indicator->name, $this->monthTranslator($indicator->date->format('m'))];
    }
}
