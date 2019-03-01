<li class="header">MENU DE NAVEGACION</li>
@foreach($modules as $module)
  @can($module->permission->slug)
    @if($module->family == 1)
      <li>
        <a href="{{ url($module->url) }}">
          <i class="{{ $module->icon }}"></i> <span>{{ $module->name }}</span>
        </a>
      </li>
    @else
      <li class="treeview">
        <a href="{{ url($module->url) }}">
          <i class="{{ $module->icon }}"></i> <span>{{ $module->name }}</span>
          <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            @foreach($submodules as $submodule)
              @can($submodule->permission->slug)
                @if($module->id == $submodule->parent)
                  <li class=""><a href="{{ url($submodule->url) }}"><i class="{{ $submodule->icon }}"></i> {{ $submodule->name }}</a></li>
                @endif
              @endcan
            @endforeach
        </ul>
      </li>
    @endif
  @endcan
@endforeach
