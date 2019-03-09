<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use App\Http\Traits\IndicatorsLimit;

class IndicatorController extends Controller
{

  use IndicatorsLimit;

    public function index(Request $request)
    {
      if (!$request->has('search')) {
        return view('indicators.index')->with(['indicators'=> Indicator::where('taxonomy_id',1)->paginate(10), 'perspectives' => Taxonomy::perspectives() ]);
      }
      $indicators = Indicator::search($request->search)->paginate(10);
      $indicators->withPath("?search={$request->search}");
      return view('indicators.index')->with(['indicators'=> $indicators, 'search' => $request->search, 'perspectives' => Taxonomy::perspectives() ]);
    }

    public function test(Indicator $indicator)
    {
      //dd($this->getLimits($indicator));
    }

    public function edit(Indicator $indicator)
    {
        //
    }

    public function update(Request $request, Indicator $indicator)
    {
        //
    }

    public function destroy(Indicator $indicator)
    {
        //
    }
}
