@extends('layouts.login')
@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
    <div class="auth-box bg-dark border-top border-secondary">
        <div id="loginform">
            <div class="text-center p-t-20 p-b-20">
                <br>
                <span class="db"><img src="{{ custom_url('/assets/images/logo.png') }}" alt="logo" /></span>
                <br>
                <br>
                <br>
                @include('includes.msg')
            </div>
            <!-- Form -->
            <form class="form-horizontal m-t-20" id="loginform" action="{{custom_url("login")}}" method="POST">
                <div class="row p-b-30">
                    <div class="col-12">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="" name="username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="" name="password">
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="row border-top border-secondary">
                    <div class="col-12">
                        <br>
                        <div class="form-group">
                            <div class="p-t-20">
                                <button class="btn btn-success float-right" type="submit">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop