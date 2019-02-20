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
        <h4><i class="icon fa fa-check"></i>Actualización Exitosa!</h4>
        <p>{{ session()->get('message') }}.</p>
      </div>
    @endif
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title"></h3>
        @can('ajustes.departamentos.crear')
          <button type="button" class="btn btn-success btn-flat pull-right" name="button" onclick="create()"> Nuevo</button>
        @endcan
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th width="60%" >Descripción</th>
              <th colspan="2">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($departments as $department)
              <tr>
                <td> {{ $department->name }} </td>
                <td> {{ $department->description ? $department->description : 'Sin descripción'}} </td>
                <td class="text-center">
                  @can('ajustes.departamentos.editar')
                    <a href="{{ route('departamentos.editar',[$department->id]) }}"><i class="fa fa-edit fa-lg"></i></a>
                  @endcan
                </td>
                <td>
                  @can('ajustes.departamentos.eliminar')
                    <a href="#"><i class="fa fa-trash fa-lg"></i></a>
                  @endcan
                </td>
              </tr>
            @endforeach
          </tbody>

        </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        {{$departments->links()}}
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
    <script type="text/javascript">
       function create()
       {
         location.href = "{{ route('departamentos.crear') }}";
       }
    </script>
@stop
