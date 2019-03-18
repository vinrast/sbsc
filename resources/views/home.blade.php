@extends('layouts.app')

@section('title', 'SBSC | Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $departments->count() }}</h3>

          <p>Departamentos</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-paper"></i>
        </div>
        <a href="{{ route('departamentos') }}" class="small-box-footer"> Ir a departamentos <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>150</h3>

          <p>Registros Borrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-search"></i>
        </div>
        <a href="#" class="small-box-footer">Ir a auditoría <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $users->count() }}</h3>

          <p>Usuarios Registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('usuarios') }}" class="small-box-footer">Ir a lista de usuarios <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{ $indicators->count() }} / {{ $indicatorsAll->count() }}</h3>

          <p>Indicadores Disponibles</p>
        </div>
        <div class="icon">
          <i class="ion ion-speedometer"></i>
        </div>
        <a href="{{ route('indicadores') }}" class="small-box-footer">Ir a Indicadores <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="box">
        <div class="box-body">
          <form class="form-horizontal" id="generateCharts">
            <div class="form-group">
              <div class="col-lg-6 col-lg-offset-2">
                <select class="form-control select2" id="indicators" name=indicators">
                    <option value=""></option>
                  @foreach($indicators as $indicator)
                    <option value="{{ $indicator->id }}">{{ $indicator->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-lg-2 ">
                <select class="form-control select2" id="years">
                </select>
              </div>
              <div class="col-lg-2">
                  <button type="submit" class="btn btn-primary btn-flat"> <i class="fa fa-search"> </i></button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Histórico por año</h3>
        </div>
        <div class="box-body">
          <div id="container">

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Promedio por año</h3>
        </div>
        <div class="box-body">
          <div id="container-2">

          </div>
        </div>
      </div>
    </div>
  </div>
@stop

<!-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop -->

@section('js')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>

  <script>
  Highcharts.chart('container', {
    chart: {
      type: 'line'
    },
    title: {
      text: 'Índice de Incorporación de Nuevos Clientes'
    },
    subtitle: {
      text: '2019'
    },
    xAxis: {
      categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
    },
    yAxis: {
      title: {
        text: ''
      }
    },
    plotOptions: {
      line: {
        dataLabels: {
          enabled: true
        },
        enableMouseTracking: true
      }
    },
    series: [{
      name: 'Indice',
      data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    }, {
      name: 'Umbral',
      data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    }]
  });

    //  graphics gauge

    Highcharts.chart('container-2', {

      chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
      },

      title: {
        text: 'Speedometer'
      },

      pane: {
        startAngle: -150,
        endAngle: 150,
        background: [{
          backgroundColor: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
              [0, '#FFF'],
              [1, '#333']
            ]
          },
          borderWidth: 0,
          outerRadius: '109%'
        }, {
          backgroundColor: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
              [0, '#333'],
              [1, '#FFF']
            ]
          },
          borderWidth: 1,
          outerRadius: '107%'
        }, {
          // default background
        }, {
          backgroundColor: '#DDD',
          borderWidth: 0,
          outerRadius: '105%',
          innerRadius: '103%'
        }]
      },

      // the value axis
      yAxis: {
        min: 0,
        max: 200,

        minorTickInterval: 'auto',
        minorTickWidth: 1,
        minorTickLength: 10,
        minorTickPosition: 'inside',
        minorTickColor: '#666',

        tickPixelInterval: 30,
        tickWidth: 2,
        tickPosition: 'inside',
        tickLength: 10,
        tickColor: '#666',
        labels: {
          step: 2,
          rotation: 'auto'
        },
        title: {
          text: 'km/h'
        },
        plotBands: [{
          from: 0,
          to: 120,
          color: '#55BF3B' // green
        }, {
          from: 120,
          to: 160,
          color: '#DDDF0D' // yellow
        }, {
          from: 160,
          to: 200,
          color: '#DF5353' // red
        }]
      },

      series: [{
        name: 'Speed',
        data: [80],
        tooltip: {
            valueSuffix: ' km/h'
        }
      }]

    },
    // Add some life
    function (chart) {
      if (!chart.renderer.forExport) {
        setInterval(function () {
          var point = chart.series[0].points[0],
            newVal,
            inc = Math.round((Math.random() - 0.5) * 20);

          newVal = point.y + inc;
          if (newVal < 0 || newVal > 200) {
            newVal = point.y - inc;
          }

          point.update(newVal);

        }, 3000);
      }
    });
  </script>
  <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
@stop
