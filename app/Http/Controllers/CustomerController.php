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
      return [$indicator->name, $this->monthTranslator($request->month)];
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
