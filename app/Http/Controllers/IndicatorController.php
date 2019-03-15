<?php

namespace App\Http\Controllers;

use App\Models\HistoryIndicator;
use App\Models\Indicator;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{

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
      // HistoryIndicator::updateOrCreate(
      //               ['indicator_id' => 1, 'date' => '2019-07-01'],
      //               ['performance_threshold' => 21, 'result' => 25]
      //             );
    }

    public function edit(Indicator $indicator)
    {
      return $indicator;
    }

    public function update(Request $request, Indicator $indicator)
    {
      $request->validate([
          'target'                => 'required|numeric',
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
        $update = $indicator->update([
          'is_active' => !$request->val,
        ]);

        return response()->json((int)!$request->val);
    }
}
