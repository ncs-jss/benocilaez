<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Details</th>
                <th>Approved?</th>
                @if($society == $accessor || $admin == 1)
                <th>Edit</th>
                <th>Delete</th>
                <th>Request</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ( $society_events as $event)
            @if($admin == 1 && $event->approved == 2)
            <tr id="row" style='background:rgba(254, 97, 0, 0.64);'>@else<tr>@endif
                <td>{{ $event->event_name }}</td>
                <td>
                    @if( $event->event_description != null)
                    <p>SHORT DESCRIPTION:</p>
                    <p>{!! $event->event_description !!}</p>
                    @endif
                </td>
                <td>
                    @if($admin == 1)
                    <label>
                        @if($event->approved == 0 )
                        <a class="btn btn-success btn-xs approve" 
                        val="{!! $event->event_id !!}"
                        role="button">
                        Approve</a>
                        @else
                        <a class="btn btn-danger btn-xs approve"
                        val="{!! $event->event_id !!}"
                        role="button">
                        Disapprove</a>
                        @endif
                    </label>
                    @else
                    <h4>
                        @if($event->approved == 0 )
                        NO
                        @else
                        YES
                        @endif
                    </h4>
                    @endif
                </td>
                @if($society == $accessor || $admin == 1)
                <td><a class="btn btn-info btn-xs"
                    val="{!! $event->event_id !!}"
                    role="edit_button"
                    appr="{{$event->approved}}"
                    {{ ($event->approved == 0 ) ? ''
                    : "disabled='disabled'" }} >
                    Edit</a>
                </td>

                <td><a class="btn btn-danger btn-xs"
                    val="{!! $event->event_id !!}"
                    role="del_button"
                    appr="{{$event->approved}}"
                    {{ ($event->approved == 1 && $event->edit_request == 0) ? ''
                    : "disabled='disabled'" }}>
                    Delete</a>
                </td>
                @endif
                <td>
                @if($admin <> 1)
                <a class="btn btn-success btn-xs approve" 
                href = "{{url('req/'. $event->event_id)}}"
                val="{!! $event->event_id !!}"
                role="button"
                {{ ($event->approved == 1 ) ? ''
                : "disabled='disabled'" }}>
                Request</a>
                @else
                <h4>
                    @if($event->edit_request == 0 )
                        NO
                    @else
                        YES
                    @endif
                </h4>
                @endif
                </td>
                </a>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class='empty' style="text-align:center">
    <h1>OOPS!!</h1>
    <h3>You dont have any events...</h3>
    <h6>Click <a href ='add_event'>here</a> to add events</h6>
</div>

<script type="text/javascript">
if($('table tr td').length != 0)
$('.empty').hide();


@if($society != $accessor)
$('.empty h3').html("This Society hasn't added any events");
$('.empty h1').html('');
$('.empty h6').html('');
@endif
</script>
