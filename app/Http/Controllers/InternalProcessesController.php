<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;
use App\Models\HistoryIndicator;
use App\Http\Traits\CommonIndicators;

class InternalProcessesController extends Controller
{
  use CommonIndicators {
    index as indexTrait;
  }

  public function index(Request $request)
  {
    return $this->indexTrait($request, "perspectives.internal-processes.index", 4);
  }
}
