@extends('layouts.app')

@section('title', 'SBSC | Indicadores')

@section('content_header')
    <h1>Indicadores</h1>
@stop

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <div class="box-body">
        <form class="form-horizontal" action="{{ route('indicadores') }}" method="get">
          <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
              <select class="form-control select2" id="perspective" name="search">
                  <option value="0">Todos</option>
                @foreach($perspectives as $perspective)
                  <option value="{{ $perspective->id }}" {{ isset($search) && $perspective->id == $search ?  'selected': '' }}>{{ $perspective->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary btn-flat"> <i class="fa fa-search"> </i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    @if(session()->has('message'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i>Operación Exitosa!</h4>
        <p>{!! session()->get('message') !!}.</p>
      </div>
    @endif
    <div>
      @include('modals/delete')
    </div>
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title"></h3>
        @can('ajustes.usuarios.crear')
          <button type="button" class="btn btn-success btn-flat pull-right" onclick="create()"> Nuevo</button>
        @endcan
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Indicador</th>
                <th>Objetivo</th>
                <th>Perspectiva</th>
                <th>Umbral de Desempeño</th>
                <th><span class="label bg-red">Negativo</span></th>
                <th><span class="label bg-yellow">Esperado</span></th>
                <th><span class="label bg-green">Positivo</span></th>
                <th colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($indicators as $indicator)
                <tr>
                  <td> {{ $indicator->name }} </td>
                  <td> {{ $indicator->target }} </td>
                  <td> {{ $indicator->taxonomy->name }} </td>
                  <td> {{ $indicator->threshold }} </td>
                  <td><span class="label bg-red">{{$indicator->graphic_type ? '<=' : '>' }} {{ $indicator->limit->negative }}</td>
                  <td><span class="label bg-yellow">{{$indicator->graphic_type ? '>' : '>' }} {{ $indicator->limit->average }}</td>
                  <td><span class="label bg-green">{{$indicator->graphic_type ? '>' : '<=' }} {{ $indicator->limit->positive }}</td>

                  <td class="text-center">
                    @can('ajustes.usuarios.editar')
                      <a href="{{ route('indicadores.editar',[$indicator->id]) }}"><i class="fa fa-pencil fa-lg"></i></a>
                    @endcan
                  </td>
                  <td>
                    @can('ajustes.indicadores.eliminar')
                      <input type="checkbox" id="is_active{{$indicator->id}}" name="is_active" value="{{$indicator->id}}" class="switch-input">
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <div class="pull-right">
          {{$indicators->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/settings/indicators.js') }}"></script>
@stop
