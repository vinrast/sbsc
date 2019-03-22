<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{

    public function index()
    {
      return view('audit.index')->with(['logs' => Audit::paginate(15)]);
    }

}
