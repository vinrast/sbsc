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
            <!-- <div class="col-sm-2">
                <button type="submit" class="btn btn-primary btn-flat"> <i class="fa fa-search"> </i></button>
            </div> -->
          </div>
        </form>
      </div>
    </div>
    <div>
      @include('indicators/modals/edit-indicator')
    </div>
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title"></h3>
        @can('ajustes.usuarios.crear')
          <!-- <button type="button" class="btn btn-success btn-flat pull-right" onclick="create()"> Nuevo</button> -->
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
                  <td id="target{{$indicator->id}}"> {{ $indicator->target }} </td>
                  <td> {{ $indicator->taxonomy->name }} </td>
                  <td id="threshold{{$indicator->id}}"> {{ $indicator->threshold }} </td>
                  <td><span class="label bg-red" id="negative{{$indicator->id}}">{{$indicator->graphic_type ? '<=' : '>' }} {{ $indicator->limit->negative }}</td>
                  <td><span class="label bg-yellow" id="average{{$indicator->id}}">{{$indicator->graphic_type ? '>' : '>' }} {{ $indicator->limit->average }}</td>
                  <td><span class="label bg-green" id="positive{{$indicator->id}}">{{$indicator->graphic_type ? '>' : '<=' }} {{ $indicator->limit->positive }}</td>
                  <td class="text-center">
                    @can('ajustes.indicadores.editar')
                      <a href="#" class="indicators-edit" data-id="{{$indicator->id}}" ><i class="fa fa-pencil fa-lg"></i></a>
                    @endcan
                  </td>
                  <td>
                    @can('ajustes.indicadores.activar')
                      <input type="checkbox" id="{{$indicator->id}}" class="is_active" name="is_active" value="{{$indicator->is_active}}" {{$indicator->is_active ? 'checked': ''}} class="switch-input">
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
