@extends('layouts.app')

@section('title', 'SBSC | Finanzas')

@section('content_header')
    <h1>Perspectiva Finanzas</h1>
@stop

@section('content')
<input type="hidden" id="perspective-id" value="finanzas">
@include('perspectives.finance.modals.roe')
@include('perspectives.finance.modals.current-liquidity')
@include('perspectives.finance.modals.impact-of-expenses')
@include('perspectives.finance.modals.asset-indebtedness')
@include('perspectives.finance.modals.equity-indebtedness')
@include('perspectives.finance.modals.net-profitability')
@include('perspectives.finance.modals.appeceament')
@include('perspectives.finance.modals.credit-liquidity')

@include('perspectives.commons.table-indicators')
@stop

@section('js')
    <script type="text/javascript" src="{{ asset('js/perspectives.js') }}"></script>
@stop
