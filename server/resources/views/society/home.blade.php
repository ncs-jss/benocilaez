@extends('layouts.default')

@section('css')
<link href="{{ custom_url('assets/libs/flot/css/float-chart.css') }} " rel="stylesheet">
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('includes.msg')
    </div>
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                @if(isset($events))
                <div class="card-body">
                    <h4 class="card-title">Active Events</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    @foreach($events as $event)
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="comment-text w-100">
                            <h6 class="font-medium">{{$event->name}}</h6>
                            <span class="m-b-15 d-block">{{$event->description}} </span>
                            <div class="comment-footer"> 
                                <a href="{{ custom_url('events/'.$event->id.'/edit') }}" type="button" class="btn btn-cyan btn-sm">Edit</a>
                                {!! Form::open(['method'=>'delete', 'route'=>['event.destroy', $event['id']], 'class'=>'delete_form']) !!}
                                    {!! Form::button('Delete', ['class'=>'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                {!! Form::close() !!}
                                {{-- <a href="{{ custom_url('events/'.$event->id) }}" type="button" class="btn btn-danger btn-sm">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                @if(isset($members))
                <div class="card-body">
                    <h4 class="card-title">All Members</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    @foreach($members as $member)
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="comment-text w-100">
                            <h6 class="font-medium">{{$member->name}}</h6>
                            <div class="comment-footer"> 
                                <a href="{{ custom_url('members/'.$member->id.'/edit') }}" type="button" class="btn btn-cyan btn-sm">Edit</a>
                                {!! Form::open(['method'=>'delete', 'route'=>['member.destroy', $member['id']], 'class'=>'delete_form']) !!}
                                {!! Form::button('Delete', ['class'=>'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                {!! Form::close() !!}
                                {{-- <a href="{{ custom_url('events/'.$event->id) }}" type="button" class="btn btn-danger btn-sm">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                @if(isset($winners))
                <div class="card-body">
                    <h4 class="card-title">Event Winners</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    @foreach($winners as $winner)
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="comment-text w-100">
                            <h6 class="font-medium">{{$winner->name}}</h6>
                            <span class="m-b-15 d-block">{{$winner->contact_no}} </span>
                            <span class="m-b-15 d-block">{{$winner->zeal_id}} </span>
                            <span class="m-b-15 d-block">{{$winner->rank}} </span>
                            <span class="m-b-15 d-block">{{$winner->year}} </span>
                            <div class="comment-footer"> 
                                <a href="{{ custom_url('winners/'.$winner->id.'/edit') }}" type="button" class="btn btn-cyan btn-sm">Edit</a>
                                {!! Form::open(['method'=>'delete', 'route'=>['winner.destroy', $winner['id']], 'class'=>'delete_form']) !!}
                                {!! Form::button('Delete', ['class'=>'btn btn-danger btn-sm', 'type'=>'submit']) !!}
                                {!! Form::close() !!}
                                {{-- <a href="{{ custom_url('events/'.$event->id) }}" type="button" class="btn btn-danger btn-sm">Delete</a> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <!-- column -->
    </div>
</div>
@stop