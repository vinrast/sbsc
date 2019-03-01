@extends('layouts.app')

@section('title', 'SBSC | Departamentos')

@section('content_header')
    <h1>Departamentos</h1>
@stop

@section('content')
<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
  @if(session()->has('message'))
    <div class="callout callout-success">
      <h4>Departamento Guardado Correctamente!</h4>
      <p>{{ session()->get('message') }}.</p>
    </div>
  @endif
  @component('departments.partials._form')
    @slot('title','Editar Departamento')
    <form class="form-horizontal" action="{{ route('departamentos.actualizar',['department' => $department->id]) }}" method="post">
      @csrf
      @include('departments.partials._inputs')
    </form>
  @endcomponent
</div>

@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/settings/departments.js') }}"></script>
@stop
