@extends('layouts.app')

@section('title', 'SBSC | Aprendizaje y Conocimiento')

@section('content_header')
    <h1>Perspectiva Aprendizaje y Conocimiento</h1>
@stop

@section('content')
<input type="hidden" id="perspective-id" value="aprendizaje">
@include('perspectives.learning-and-knowledge.modals.add-services')
@include('perspectives.learning-and-knowledge.modals.creativity')
@include('perspectives.learning-and-knowledge.modals.claims')
@include('perspectives.learning-and-knowledge.modals.quality')
@include('perspectives.learning-and-knowledge.modals.customer-satisfaction')
@include('perspectives.learning-and-knowledge.modals.absenteeism')
@include('perspectives.learning-and-knowledge.modals.employee-satisfaction')


@include('perspectives.commons.table-indicators')
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/perspectives.js') }}"></script>
@stop
