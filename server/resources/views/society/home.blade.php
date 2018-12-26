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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Active Events</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    @if(isset($events))
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
                    @endif
                </div>
            </div>
        </div>
        <!-- column -->

        <div class="col-lg-6">
            <!-- Tabs -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Past Events</h4>
                    <div class="todo-widget scrollable" style="height:450px;">
                        <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label todo-label" for="customCheck">
                                        <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span> <span class="badge badge-pill badge-danger float-right">Today</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40" src="../../assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40" src="../../assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40" src="../../assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40" src="../../assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                </ul>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label todo-label" for="customCheck1">
                                        <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing</span><span class="badge badge-pill badge-primary float-right">1 week </span>
                                    </label>
                                </div>
                                <div class="item-date"> 26 jun 2017</div>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label todo-label" for="customCheck2">
                                        <span class="todo-desc">Give Purchase report to</span> <span class="badge badge-pill badge-info float-right">Yesterday</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40" src="../../assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40" src="../../assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                </ul>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label todo-label" for="customCheck3">
                                        <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing </span> <span class="badge badge-pill badge-warning float-right">2 weeks</span>
                                    </label>
                                </div>
                                <div class="item-date"> 26 jun 2017</div>
                            </li>
                            <li class="list-group-item todo-item" data-role="task">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label todo-label" for="customCheck4">
                                        <span class="todo-desc">Give Purchase report to</span> <span class="badge badge-pill badge-info float-right">Yesterday</span>
                                    </label>
                                </div>
                                <ul class="list-style-none assignedto">
                                    <li class="assignee"><img class="rounded-circle" width="40" src="../../assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                    <li class="assignee"><img class="rounded-circle" width="40" src="../../assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop