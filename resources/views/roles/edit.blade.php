@extends('layouts.app')

@section('title', 'SBSC | Roles')

@section('content_header')
    <h1>Roles de Usuario</h1>
@stop

@section('content')
<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
  @if(session()->has('message'))
    <div class="callout callout-success">
      <h4>Rol Actualizado Correctamente!</h4>
      <p>{{ session()->get('message') }}.</p>
    </div>
  @endif
  @component('roles.partials._form')
    @slot('title','Editar Rol')
    <form class="form-horizontal" action="{{ route('roles.actualizar',['role' => $role->id]) }}" method="post">
      @csrf
      @include('roles.partials._inputs')
    </form>
  @endcomponent
</div>

@stop

@section('js')
  <script type="text/javascript" src="{{ asset('js/settings/roles.js') }}"></script>
@stop
