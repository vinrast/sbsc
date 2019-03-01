@extends('layouts.app')

@section('title', 'SBSC | Departamentos')

@section('content_header')
    <h1>Roles de Usuario</h1>
@stop

@section('content')
<div class="row">
  <div class="col-lg-8 col-lg-offset-2">
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
        @can('ajustes.roles.crear')
          <button type="button" class="btn btn-success btn-flat pull-right" name="button" onclick="create()"> Nuevo</button>
        @endcan
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-hover ">
            <thead>
              <tr>
                <th>Nombre</th>
                <th width="40%" >Descripción</th>
                <th width="20%">Permisos Especiales</th>
                <th>Usuarios</th>
                <th colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($roles as $role)
                <tr>
                  <td> {{ $role->name }} </td>
                  <td> {{ $role->description ? $role->description : 'Sin descripción'}} </td>
                  <td>{{ $role->special ? $role->special: 'No definidos' }}</td>
                  <td>{{ $role->users()->count() }}</td>
                  <td class="text-center">
                    @can('ajustes.roles.editar')
                      <a href="{{ route('roles.editar',[$role->id]) }}"><i class="fa fa-pencil fa-lg"></i></a>
                    @endcan
                  </td>
                  <td>
                    @can('ajustes.roles.eliminar')
                      @if( !$role->users()->count() )
                        <a href="#" data-id="{{ $role->id }}" class="delete-role-btn"><i class="fa fa-trash fa-lg"></i></a>
                      @endif
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
          {{$roles->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
  <script type="text/javascript" src="{{ asset('js/settings/roles.js')}}"></script>
@stop
