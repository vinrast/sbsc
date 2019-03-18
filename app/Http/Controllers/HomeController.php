<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;
use App\Models\HistoryIndicator;
use App\User;
use App\Models\Department;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
                                    'indicators'     => Indicator::actives(),
                                    'indicatorsAll'  => Indicator::all(),
                                    'users'          => User::all(),
                                    'departments'    => Department::all(),
                                  ]);
    }

    public function getYearsIndicators(Indicator $indicator)
    {
      $registers = HistoryIndicator::where('indicator_id', $indicator->id)->get();
      return $this->getArrayYears($registers);
    }

    protected function getArrayYears($registers)
    {
      $years = [];
      foreach($registers as $register)
      {
        if (!in_array($register->date->format('Y'), $years)){
          $years[] = $register->date->format('Y');
        }
      }
      return $years;
    }


}
