@extends('layouts.app')

@section('title', 'SBSC | Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
<div class="row">
  <div class="col-lg-8 col-lg-offset-2">
    <div class="box">
      <div class="box-body">
        <form class="form-horizontal" action="{{ route('usuarios') }}" method="get">
          <div class="form-group">
            <div class="col-sm-6 col-sm-offset-2">
              <input type="text" class="form-control" id="search" name="search" value="{{ isset($search) ? $search :null }}" placeholder="Nombre / Email">
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
                <th>Nombre</th>
                <th>Email</th>
                <th>Departamento</th>
                <th>Rol</th>
                <th colspan="3">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td> {{ $user->name }} </td>
                  <td> {{ $user->email}} </td>
                  <td>{{ $user->department->name }}</td>
                  @foreach($user->roles as $rol)
                    <td>{{ $rol->name }}</td>
                  @endforeach
                  <td class="text-center">
                      <a href="{{ route('usuarios.ver',[$user->id]) }}"><i class="fa fa-search fa-lg"></i></a>
                  </td>
                  <td class="text-center">
                    @can('ajustes.usuarios.editar')
                      <a href="{{ route('usuarios.editar',[$user->id]) }}"><i class="fa fa-pencil fa-lg"></i></a>
                    @endcan
                  </td>
                  <td>
                    @can('ajustes.usuarios.eliminar')
                        <a href="#" data-id="{{ $user->id }}" class="delete-user-btn"><i class="fa fa-trash fa-lg"></i></a>
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
          {{$users->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/settings/users.js') }}"></script>
@stop
