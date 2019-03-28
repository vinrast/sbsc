<?php

namespace App\Http\Controllers;

use App\Models\HistoryIndicator;
use App\Models\Indicator;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use App\Http\Traits\Audit;
use Illuminate\Support\Facades\DB;

class IndicatorController extends Controller
{
  use Audit;

    public function index(Request $request)
    {
      if (!$request->has('search')) {
        return view('indicators.index')->with(['indicators'=> Indicator::paginate(10), 'perspectives' => Taxonomy::perspectives() ]);
      }
      $indicators = Indicator::search($request->search)->paginate(10);
      $indicators->withPath("?search={$request->search}");
      return view('indicators.index')->with(['indicators'=> $indicators, 'search' => $request->search, 'perspectives' => Taxonomy::perspectives() ]);
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
      DB::transaction(function() use ($request, $indicator) {
        $this->updateIndicator($request, $indicator);
        $indicator->update([
          'target'                => $request->target,
          'performance_threshold' => $request->performance_threshold
        ]);

      });

      return $indicator;
    }

    public function active(Request $request, Indicator $indicator)
    {
        $update = $indicator->update([
          'is_active' => !$request->val,
        ]);

        return response()->json((int)!$request->val);
    }
}
