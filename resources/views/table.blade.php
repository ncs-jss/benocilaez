<html>
<body>
	<table class="table table-bordered">
		<tr>
			<th style="width:5%">#</th>
			<th class="col-md-2">Event Name</th>
			<th class="col-md-6">Event Description</th>
			<th class="col-md-1">Approved?</th>
			@if($society == $accessor)
			<th class="col-md-1">Edit</th>
			<th class="col-md-1">Delete</th>
			@endif
		</tr>
		<?php $i=0; ?>
		@foreach ( $society_events as $event)
		<?php $i++; ?>
		<tr>
			<td>{{ $i }}</td>
			<td>{{ $event->event_name }}</td>
			<td>
				@if( $event->event_description != null)
				@if( $event->event_description->short_des != '')
				<p>SHORT DESCRIPTION:</p>
				<p>{{ $event->event_description->short_des }}</p>
				@endif
				@if( $event->event_description->long_des != '')
				<p>LONG DESCRIPTION:</p>
				<p>{!! $event->event_description->long_des !!}</p>
				@endif
				@if( count($event->event_description->rules) > 0 && $event->event_description->rules[0] != '')
				<p>RULES:</p>
				<ol>
					@foreach($event->event_description->rules as $rule)
					<li>{{ $rule }}</li>
					@endforeach
				</ol>
				@endif
				@endif
			</td>
			<td>
				@if($admin == 1)
				<label>
					<!--<input type="checkbox"
					{{ ($event->approved == 0 ) ? 
					'' : 'checked' }}>-->
					@if($event->approved == 0 )
					<a class="btn btn-success btn-xs" 
					href="edit_event/{!! $event->event_id !!}" 
					role="button"> 
					Approve</a>
					@else
					<a class="btn btn-danger btn-xs" 
					href="edit_event/{!! $event->event_id !!}" 
					role="button"> 
					diapprove</a>
					@endif
				</label>

				@else
				{{ ($event->approved == 0 ) ? 
				'No' : 'Yes' }}
				@endif

			</td>
			@if($society == $accessor)
			<td><a class="btn btn-info btn-xs" 
				href="edit_event/{!! $event->event_id !!}" 
				role="button" 
				{{ ($event->approved == 0 ) ? '' 
				: "disabled='disabled'" }} >
				Edit</a>
			</td>

			<td><a class="btn btn-danger btn-xs" 
				href="delete/{!! $event->event_id !!}" 
				role="button" 
				{{ ($event->approved == 0 ) ? '' 
				: "disabled='disabled'" }}>
				Delete</a>
			</td>
			@endif
		</tr>
		@endforeach 
	</table>	

</body>
</html>