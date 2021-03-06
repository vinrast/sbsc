@extends('layouts.app')

@section('title', 'SBSC | Departamentos')

@section('content_header')
    <h1>Departamentos</h1>
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
        @can('ajustes.departamentos.crear')
          <button type="button" class="btn btn-success btn-flat pull-right" name="button" onclick="create()"> Nuevo</button>
        @endcan
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th width="40%" >Descripción</th>
                <th>Usuarios</th>
                <th colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($departments as $department)
                <tr>
                  <td> {{ $department->name }} </td>
                  <td> {{ $department->description ? $department->description : 'Sin descripción'}} </td>
                  <td>{{ $department->users()->count() }}</td>
                  <td class="text-center">
                    @can('ajustes.departamentos.editar')
                      <a href="{{ route('departamentos.editar',[$department->id]) }}"><i class="fa fa-pencil fa-lg"></i></a>
                    @endcan
                  </td>
                  <td>
                    @can('ajustes.departamentos.eliminar')
                      @if( !$department->users()->count() )
                        <a href="#" data-id="{{ $department->id }}" class="delete-department-btn"><i class="fa fa-trash fa-lg"></i></a>
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
          {{$departments->links()}}
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/settings/departments.js') }}"></script>
@stop
