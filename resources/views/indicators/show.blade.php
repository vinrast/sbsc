@extends('layouts.app')

@section('title', 'SBSC | Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Detalle de usuario</h3>
    </div>
    <div class="box-body">
      <div class="col-sm-4">
        <img src="{{ asset('vendor/adminlte/images')}}/{{ $user->avatar ?? 'placeholder_user.png' }}" class="img-detail" alt="User Image">
      </div>
      <div class="col-sm-4">
        <b>Nombre</b>
        <p>{{ $user->name }}</p>
        <b>Email</b>
        <p>{{ $user->email }}</p>
        <b>Departamento</b>
        <p>{{ $user->department->name }}</p>
      </div>
      <div class="col-sm-4">
        <b>Rol</b>
        <p>{{ $user->roles->first()->name }}</p>
        <b>Fecha de Registro</b>
        <p>{{ $user->created_at->format('d-M-Y') }}</p>
      </div>
    </div>
    <div class="box-footer">
      <button type="button" onclick="back()" class="btn btn-default btn-flat ">Volver</button>
    </div>
  </div>
</div>

@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/settings/users.js') }}"></script>
@stop
