<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;
use App\Models\HistoryIndicator;
use App\Http\Traits\CommonIndicators;

class LearningController extends Controller
{
  use CommonIndicators {
    index as indexTrait;
  }

  public function index(Request $request)
  {
    return $this->indexTrait($request, "perspectives.learning-and-knowledge.index", 2);
  }
}
