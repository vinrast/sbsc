@extends('layouts.app')

@section('title', 'SBSC | Procesos Internos')

@section('content_header')
    <h1>Perspectiva Procesos Internos del Negocio</h1>
@stop

@section('content')
<input type="hidden" id="perspective-id" value="procesos-internos">
@include('perspectives.internal-processes.modals.projects-after')
@include('perspectives.internal-processes.modals.damaged-machines')
@include('perspectives.internal-processes.modals.incidents')
@include('perspectives.internal-processes.modals.deliveries-after')
@include('perspectives.internal-processes.modals.deals')
@include('perspectives.internal-processes.modals.machine-performance')
@include('perspectives.commons.table-indicators')
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/perspectives.js') }}"></script>
@stop
