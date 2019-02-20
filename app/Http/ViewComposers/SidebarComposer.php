<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\SidebarLink;

class SidebarComposer {

  public function compose(View $view)
  {
    $modules = SidebarLink::whereIn('family',['0','1'])->get();
    $submodules = SidebarLink::where('family','2')->get();

    $view->with(['modules' => $modules, 'submodules' => $submodules]);
  }

}
