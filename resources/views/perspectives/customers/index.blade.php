@extends('layouts.app')

@section('title', 'SBSC | Clientes')

@section('content_header')
    <h1>Perspectiva Clientes</h1>
@stop

@section('content')
<input type="hidden" id="perspective-id" value="clientes">
@include('perspectives.customers.modals.new-customer')
@include('perspectives.customers.modals.contracts-lost')
@include('perspectives.customers.modals.delayed-deliveries')
@include('perspectives.customers.modals.increase-in-billing')
@include('perspectives.customers.modals.customer-rejection')
@include('perspectives.customers.modals.customer-satisfaction')
@include('perspectives.customers.modals.price-variation')
@include('perspectives.commons.table-indicators')
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/perspectives.js') }}"></script>
@stop
