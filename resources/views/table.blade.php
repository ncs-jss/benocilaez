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
					<input type="checkbox"
					{{ ($event->approved == 0 ) ? 
					'' : 'checked' }}>
				</label>

				@else
				{{ ($event->approved == 0 ) ? 
				'No' : 'Yes' }}
				@endif

			</td>
			@if($society == $accessor)
			<td><a class="btn btn-info btn-xs" 
				val="{!! $event->event_id !!}" 
				role="edit_button" 
				{{ ($event->approved == 0 ) ? '' 
				: "disabled='disabled'" }} >
				Edit</a>
			</td>

			<td><a class="btn btn-danger btn-xs" 
				val="{!! $event->event_id !!}" 
				role="del_button" 
				{{ ($event->approved == 0 ) ? '' 
				: "disabled='disabled'" }}>
				Delete</a>
			</td>
			@endif
		</tr>
		@endforeach 
	</table>	
	<div class='empty'>
		<h1>OOPS!!</h1>
		<h3>You dont have any events...</h3>
		<h6>Click <a href ='add_event'>here</a> to add events</h6> 
	</div>
	<script type="text/javascript">
		if($('table tr td').length != 0)
			$('.empty').hide();
		
		$('a[role=edit_button]').click(function(){

		});

		$('a[role=del_button]').click(function(response){
			$(this).removeClass('btn-danger');
			$(this).addClass('btn-warning');
			$(this).html('Deleting...');
			var x = $(this);
			$.get('delete/' + $(this).attr('val'), function(res){
				if(res == '1'){
					x.parent().parent().remove()
					if($('table tr td').length == 0){
						$('.empty').show();
					}
				}else{
					x.html('Error');
					x.addClass('disabled');
					setTimeout(function(){
						x.html('Delete');
						x.removeClass('btn-warning');
						x.removeClass('disabled');
						x.addClass('btn-danger');
					}, 2000);
				}
			});
		});
	</script>

</body>
</html>