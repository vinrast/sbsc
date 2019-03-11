@extends('layouts.app')

@section('title', 'SBSC | Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
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
          <h3>150</h3>

          <p>Registros Borrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-search"></i>
        </div>
        <a href="#" class="small-box-footer">Ir a auditoría <i class="fa fa-arrow-circle-right"></i></a>
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
          <h3>{{ $indicators->count() }}</h3>

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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
