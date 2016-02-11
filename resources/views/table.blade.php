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
	<span id ='err' style='display:none; position:absolute; 
							background:#efefef; color:#121212; 
							border-radius:2px; padding:2em; font-size:.9em;
							font-weight:100'>
							<h3 style='margin:0px'>Note:</h3>
							<p>
								You cannot edit or delete an approved event.<br>
								To do so you need to send a request to the admin for doing so.
							</p>
							<div>
								<button id='cancel' class='btn btn-info'>Cancel</button>
								<button id='send-req' class='btn btn-warning'>Send Request</button>
							</div>
	</span>

	<script type="text/javascript">
	if($('table tr td').length != 0)
		$('.empty').hide();


	@if($society != $accessor)
	$('.empty h3').html("This Society hasn't added any events");
	$('.empty h1').html('');
	$('.empty h6').html('');
	@endif



	request = function(x, y, id){
		$('#err #send-req').attr('val', id);
		$('#err').css({'top': y, 'left': x}).fadeIn('fast');
	};

	$('#cancel').click(function(){
		$('#err').css('display', 'none');
	});

	$('#send-req').click(function(){
		//change approval status ...
	});

	$('a[role=edit_button]').click(function(){
		if($(this).attr('disabled') == 'disabled'){
			var left = $(document).width() - $('#err').width();
			var top = $(document).height() - $('#err').height();
			request(left/2 + 'px', top/2 + 'px', $(this).attr('val'));
			return;
		}
		window.location = 'edit_event/' + $(this).attr('val');
	});


	$('a[role=del_button]').click(function(response){
		if($(this).attr('disabled') == 'disabled')
			return;
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