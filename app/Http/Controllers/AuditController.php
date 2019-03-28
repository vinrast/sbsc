<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Taxonomy;
use App\User;
use Illuminate\Http\Request;

class AuditController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    if (!$request->has('action')) {
      return view('audit.index')->with(['logs' => Audit::paginate(15),
                                        'actions' => Taxonomy::where('family',2)->get(),
                                        'places' => Taxonomy::where('family',3)->get(),
                                        'users' => User::all()
                                      ]);
    }else{

      $logs=Audit::whereBetween('created_at', [$request->begin, $request->end." 23:59:59"])->newQuery();
      if ($request->action != 0) {
        $logs->where('action_id',$request->action);
      }
      if ($request->place != 0) {
        $logs->where('place_id',$request->place);
      }
      if ($request->user != 0) {
        $logs->where('user',User::where('id', $request->user)->pluck('email')->first());
      }
      $logs=$logs->paginate(15);
      $logs->withPath("?action={$request->action}&place={$request->place}&input_1={$request->user}&begin={$request->begin}&end={$request->end}");

      return view('audit.index')->with(['logs' => $logs,
                                        'actions' => Taxonomy::where('family',2)->get(),
                                        'places' => Taxonomy::where('family',3)->get(),
                                        'users' => User::all(),
                                        'request' => $request
                                      ]);

    }
  }

}
