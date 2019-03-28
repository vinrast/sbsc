@extends('layouts.app')

@section('title', 'SBSC | Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  @can('dasboard.accesos')
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $departments->count() }}</h3>

            <p>Departamentos</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-paper"></i>
          </div>
          <a href="{{ route('departamentos') }}" class="small-box-footer"> Ir a departamentos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$audit->count() }}</h3>

            <p>Registros Borrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-search"></i>
          </div>
          <a href="{{ route('auditoria' )}}" class="small-box-footer">Ir a auditoría <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $users->count() }}</h3>

            <p>Usuarios Registrados</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('usuarios') }}" class="small-box-footer">Ir a lista de usuarios <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $indicators->count() }} / {{ $indicatorsAll->count() }}</h3>

            <p>Indicadores Disponibles</p>
          </div>
          <div class="icon">
            <i class="ion ion-speedometer"></i>
          </div>
          <a href="{{ route('indicadores') }}" class="small-box-footer">Ir a Indicadores <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
  @endcan
  <div class="row">
    <div class="col-sm-12">
      <div class="box">
        <div class="box-body">
          <form class="form-horizontal" id="generateCharts">
            <div class="form-group">
              <div class="col-lg-6 col-lg-offset-2 col-md-6 col-md-offset-2 container container-input_1-help">
                <select class="form-control select2" id="indicators" name="input_1">
                    <option value=""></option>
                  @foreach($indicators as $indicator)
                    <option value="{{ $indicator->id }}">{{ $indicator->name }}</option>
                  @endforeach
                </select>
                <span  style="display:none;" class="help-block input_1-help">
                    <strong>error 1</strong>
                </span>
              </div>
              <div class="col-lg-2 col-md-2 container container-input_2-help">
                <select class="form-control select2" id="years" name="input_2">
                </select>
                <span style="display:none;" class="help-block input_2-help">
                    <strong>error 2</strong>
                </span>
              </div>
              <div class="col-lg-2 col-md-2">
                  <button type="submit" class="btn btn-primary btn-flat"> <i class="fa fa-search"> </i></button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-7">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Histórico Anual</h3>
        </div>
        <div class="box-body">
          <div id="container">
            <div class="alert alert-info alert-dismissible">
              <h4><i class="icon fa fa-info"></i>Seleccione un indicador!</h4>
                Al seleccionar un indicador y el año, podra visualizar el gráfico estadístico de todo el año.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Promedio Anual</h3>
        </div>
        <div class="box-body">
          <div id="container-2">
            <div class="alert alert-info alert-dismissible">
              <h4><i class="icon fa fa-info"></i>Seleccione un indicador!</h4>
                Obtendra el promedio del año con sus limites de forma gráfica.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

<!-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop -->

@section('js')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>

  <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
@stop
