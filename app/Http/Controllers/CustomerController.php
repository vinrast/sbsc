<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\CommonIndicators;

class CustomerController extends Controller
{
  use CommonIndicators {
    index as indexTrait;
  }

  public function index(Request $request)
  {
    return $this->indexTrait($request, "perspectives.customers.index", 1);
  }
}
