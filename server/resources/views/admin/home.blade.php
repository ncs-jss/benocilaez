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
                <a class="btn btn-primary btn-md" href="{{ custom_url('admin/events/members') }}" target="_blank">Events Members</a>
            </div>
            <div class="card">
                <a class="btn btn-primary btn-md" href="{{ custom_url('admin/events/winners') }}" target="_blank">Events Winners</a>
            </div>
        </div>
        <!-- column -->
    </div>
</div>
@stop