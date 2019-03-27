@extends('layouts.admin')

@section('css')
<link href="{{ custom_url('assets/libs/flot/css/float-chart.css') }} " rel="stylesheet">
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('includes.msg')
    </div>
    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">



            </div>
        </div>
        <!-- column -->
    </div>
</div>
@stop