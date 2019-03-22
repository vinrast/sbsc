@extends('layouts.app')

@section('title', 'SBSC | Auditoria')

@section('content_header')
    <h1>Auditoria</h1>
@stop

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title"></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Acción</th>
                <th>Lugar</th>
                <th>Usuario</th>
                <th>Registro</th>
                <th>Campos Actualizados</th>
                <th>Hora y Fecha</th>
              </tr>
            </thead>
            <tbody>
              @foreach($logs as $log)
                <tr>
                  <td> {{ $log->action->name }} </td>
                  <td> {{ isset($log->place->name) ? $log->place->name: null }} </td>
                  <td>{{ $log->user }}</td>
                  <td>{{ $log->register }}</td>
                  <td>{!! $log->update_values !!}</td>
                  <td>{{ $log->created_at->format('(g:i a) - d-m-Y') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <div class="pull-right">
          {{$logs->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
    <!-- <script type="text/javascript" src="{{ asset('js/settings/departments.js') }}"></script> -->
@stop
