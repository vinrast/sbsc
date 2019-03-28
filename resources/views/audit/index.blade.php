@extends('layouts.app')

@section('title', 'SBSC | Auditoria')

@section('content_header')
    <h1>Auditoria</h1>
@stop

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="box-body">
        <form class="form-horizontal" id="auditForm">
          <div class="form-group">
            <div class="col-lg-2 col-md-2">
              <select class="form-control select2" id="action" name="action">
                  <option value="0">Todos</option>
                @foreach($actions as $action)
                  <option value="{{ $action->id }}" {{ isset($request) && $action->id == $request->action ?  'selected': '' }}>{{ $action->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-2 col-md-2">
              <select class="form-control select2" id="place" name="place">
                <option value="0">Todos</option>
                @foreach($places as $place)
                  <option value="{{ $place->id }}" {{ isset($request) && $place->id == $request->place ?  'selected': '' }}>{{ $place->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-2 col-md-2">
              <select class="form-control select2" id="user" name="user">
                  <option value="0">Todos</option>
                @foreach($users as $user)
                  <option value="{{ $user->id }}" {{ isset($request) && $user->id == $request->user ?  'selected': '' }}>{{ $user->email }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-2 col-md-2">
              <input class="form-control" type="date"id="begin" name="begin" value="{{ isset($request) ? $request->begin : '' }}">
            </div>
            <div class="col-lg-2 col-md-2">
              <input class="form-control" type="date" id="end" name="end" value="{{ isset($request) ? $request->end : '' }}">
            </div>
            <div class="col-lg-1 col-md-1">
                <button type="submit" class="btn btn-primary btn-flat"> <i class="fa fa-search"> </i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
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
    <script type="text/javascript" src="{{ asset('js/audit.js') }}"></script>
@stop
