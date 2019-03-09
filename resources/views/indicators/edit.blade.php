@extends('layouts.app')

@section('title', 'SBSC | Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
  @component('departments.partials._form')
    @slot('title','Editar Usuario')
    <form class="form-horizontal" action="{{ route('usuarios.actualizar',['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
      @csrf
      @include('users.partials._inputs')
    </form>
  @endcomponent
</div>

@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/settings/users.js') }}"></script>
@stop
