@extends('layouts.app')

@section('title', 'SBSC | Clientes')

@section('content_header')
    <h1>Perspectiva Clientes</h1>
@stop

@section('content')
@include('perspectives.customers.modals.new-customer')
@include('perspectives.customers.modals.contracts-lost')
@include('perspectives.customers.modals.delayed-deliveries')
@include('perspectives.customers.modals.increase-in-billing')
@include('perspectives.customers.modals.customer-rejection')
@include('perspectives.customers.modals.customer-satisfaction')
@include('perspectives.customers.modals.price-variation')

@include('modals.delete')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-body">
        <form class="form-horizontal" action="{{ route('clientes') }}" method="get">
          <div class="form-group">
            <div class="col-sm-4 col-sm-offset-4">
              <select class="form-control select2" id="year" name="search">
                @foreach($years as $year)
                  <option value="{{ $year }}" {{ isset($search) && $year == $search ?  'selected': '' }}>{{ $year }}</option>
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
            @foreach($indicators as $indicator)
              <tr>
                <td>{{ $indicator->name }}</td>
                @for($a=1; $a<13; $a++)
                  <td class="month"  id="{{$indicator->id}}-{{ strlen($a) == 1 ? "0{$a}": $a }}"   data-indicator="{{ $indicator->id }}"  @can('ajustes.indicadores') data-tooltip="true" @endcan data-month='{{ strlen($a) == 1 ? "0{$a}": $a }}'>
                    @foreach( $registers as $register)
                      @if( $register->indicator_id == $indicator->id && $register->date->format('m') == $a)
                        <center  data-placement="left" data-html="true" @can('ajustes.indicadores') data-toggle="tooltip"  title='{{ $register->title }}' @endcan>
                        {!! $register->label !!}
                        </center>
                      @endif
                    @endforeach
                  </td>
                @endfor
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/perspectives.js') }}"></script>
@stop
