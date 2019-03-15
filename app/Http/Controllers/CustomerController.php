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
      return [$indicator->name, $this->monthTranslator($request->month),
              "{$request->year}-{$request->month}-01", $indicator->id,
              $indicator->performance_threshold, $indicator->inputs_type
              ];
    }

    public function storage(Request $request)
    {
      $this->validateData($request);

      $register = HistoryIndicator::updateOrCreate(
                    ['indicator_id' => $request->indicator, 'date' => $request->date],
                    ['performance_threshold' => $request->threshold, 'result' => $this->getResult($request)]
                  );

      dd($register);
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
        'input_1' => 'required|numeric',
        'input_2' => $request->has('input_2') ? 'required|numeric' : 'nullable',
      ]);
    }
}
