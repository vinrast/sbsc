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
        return view('indicators.index')->with(['indicators'=> Indicator::paginate(10), 'perspectives' => Taxonomy::perspectives() ]);
      }
      $indicators = Indicator::search($request->search)->paginate(10);
      $indicators->withPath("?search={$request->search}");
      return view('indicators.index')->with(['indicators'=> $indicators, 'search' => $request->search, 'perspectives' => Taxonomy::perspectives() ]);
    }

    public function test()
    {
      // dd((fmod(1500.00, 1) !== 0.00) ? 1500.00 : (int)1500.00);
    }

    public function edit(Indicator $indicator)
    {
      return $indicator;
    }

    public function update(Request $request, Indicator $indicator)
    {
      $request->validate([
          'target'                => 'required',
          'performance_threshold' => 'required|numeric'
      ]);

      $indicator->update([
        'target'                => $request->target,
        'performance_threshold' => $request->performance_threshold
      ]);

      return $indicator;
    }

    public function active(Request $request, Indicator $indicator)
    {
        $indicator->update([
          'is_active' => !$request->val,
        ]);

        return 'actualizado!!';
    }
}
