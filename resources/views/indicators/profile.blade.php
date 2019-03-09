@extends('layouts.app')

@section('title', 'SBSC | Usuarios')

@section('content_header')
    <h1>Mi Perfil</h1>
@stop

@section('content')
<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
  @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i>Operación Exitosa!</h4>
      <p>{!! session()->get('message') !!}.</p>
    </div>
  @endif
  @component('users.partials._form')
    @slot('title','Editar Perfil')
    <form class="form-horizontal" action="{{ route('actualizar.mi-perfil',['user'=> $user->id ]) }}" method="post" enctype="multipart/form-data">
      @csrf
      @include('users.partials._inputs')
    </form>
  @endcomponent
</div>

@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/settings/users.js') }}"></script>
@stop
