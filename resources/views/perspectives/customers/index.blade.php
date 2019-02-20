@extends('layouts.app')

@section('title', 'SBSC | Clientes')

@section('content_header')
    <h1>Perspectiva Clientes</h1>
@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="200px">Indicador</th>
              <th>Enero</th>
              <th>Febrero</th>
              <th>Marzo</th>
              <th>Abril</th>
              <th>Mayo</th>
              <th>Junio</th>
              <th>Julio</th>
              <th>Agosto</th>
              <th>Septiembre</th>
              <th>Octubre</th>
              <th>Noviembre</th>
              <th>Diciembre</th>
            </tr>
          </thead>
          <tbody>
            @for($i=1; $i<6; $i++)
                @php $b=2;
                @endphp
                <td>Indicador de Gestion</td>
                @for($a=1; $a<5; $a++)
                @php $c=2;
                @endphp
                  @if($b == $c)
                    <td>
                        {{$a}}
                    </td>
                  @endif
                @endfor
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
