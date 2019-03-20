
$(document).ready(function() {
  $('#indicators').select2({
    width: '100%',
    placeholder: 'Seleccione un indicador de lista',
    "language": {
     "noResults": function(){
         return "No existen coincidencias con la búsqueda";
         }
     },
      escapeMarkup: function (markup) {
          return markup;
      }
  });
  $('#years').select2({
    width: '100%',
    placeholder: 'Seleccione el año disponible',
    "language": {
     "noResults": function(){
         return "No coincide ningun año";
         }
     },
      escapeMarkup: function (markup) {
          return markup;
      }
  });

  $('body').on( 'change', '#indicators', function(event) {
    event.preventDefault();
    var id = $('#indicators').children("option:selected").val();
    var url = url_global+"/buscar-ano/"+id;
    $.ajax({
      url:url,
      type:'post',
      beforeSend:showPreload(),
      success:function(respuesta){
        hidePreload();
        $('.opcion').remove();
        $.each(respuesta, function(e){
          $('#years').append("<option value="+respuesta[e]+" class='opcion' >"+respuesta[e]+"</option>");
        });
      },
      error: function(respuesta) {
        hidePreload();
        errors(respuesta);
      }
    });
  });

  $('body').on('submit', '#generateCharts', function(event) {
    event.preventDefault();
    var formData = $(this).serializeArray();
    var url = `${url_global}/generar`;
    $.ajax({
      data:formData,
      url:url,
      type:'post',
      beforeSend:showPreload(),
      success:function(respuesta){
        hidePreload();
        $('.container').removeClass('has-error');
        $('.help-block').hide();
        //console.log(respuesta);
        graphic_1(respuesta[0]);
        graphic_2(respuesta[1]);
        //console.log(respuesta);

      },
      error: function(respuesta) {
        hidePreload();
        errors(respuesta);
      }
    });
  });


});

function graphic_1(data){
  var index = Object.values(data.index);
  var thresholds = Object.values(data.thresholds);
  Highcharts.chart('container', {
    chart: {
      type: 'line'
    },
    title: {
      text: data.indicator
    },
    subtitle: {
      text: data.year
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
      data: index
    }, {
      name: 'Umbral',
      data: thresholds
    }],
    credits: {
      enabled: false
    },
  });

}

function graphic_2(data){

  Highcharts.chart('container-2', {

    chart: {
      type: 'gauge',
      plotBackgroundColor: null,
      plotBackgroundImage: null,
      plotBorderWidth: 0,
      plotShadow: false
    },

    title: {
      text: data.indicator
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
      max: data.final,

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
        text: ''
      },
      plotBands: [ data.range_initial,
                   data.range_medium,
                   data.range_final,
                 ]
    },

    series: [{
      name: 'Promedio',
      data: [data.avg_result],
      tooltip: {
          valueSuffix: ''
      }
    }],
    credits: {
      enabled: false
    },

  });
}
