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
		
		@if($admin == 1 && $event->approved == 2)
		<tr style='background:rgba(254, 97, 0, 0.64);'>
			@else
			<tr>
				@endif

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
		


		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<p>
							
							
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="send-req">Send Request</button>
					</div>
				</div>
			</div>
		</div>



		<script type="text/javascript">
		if($('table tr td').length != 0)
			$('.empty').hide();


		@if($society != $accessor)
		$('.empty h3').html("This Society hasn't added any events");
		$('.empty h1').html('');
		$('.empty h6').html('');
		@endif

		$(document).ready(function(){

			request = function(id){
				$('#myModal #send-req').attr('val', id);
				$('#myModal h4').html("Well here's the problem&hellip;");
				
				@if($admin == 1)
				$('#myModal p').html('You cannot edit/delete an approved event.'+
					'<br>Disapprove the event to continue.');
				$('#send-req').hide();
				@else
				$('#myModal p').html("You cannot edit or delete an approved event.<br>"+
					"To do so you'll need to send a request the admin to disapprove the particular event.<br>"+
					"Click on the send request button to send a disapproval event to the admin.");
				$('#send-req').show();
				@endif
				$('#myModal').modal('show');
			};


			$('.approve').click(function(){
				var id = $(this).attr('val');
				var x = $(this);
				console.log('here');
				console.log('approve/'+id);
				$.get('approve/' + id, function(res){
					if(res == '1'){
						if(x.hasClass('btn-success')){
							x.removeClass('btn-success');
							x.html('Disapprove');
							x.addClass('btn-danger');
							$('a[role=del_button]', x.parent().parent().parent()).attr('disabled', 'disabled');
							$('a[role=edit_button]', x.parent().parent().parent()).attr('disabled', 'disabled');
						}else{
							x.removeClass('btn-danger');
							x.html('Approve');
							x.addClass('btn-success');
							$('a[role=del_button]', x.parent().parent().parent()).removeAttr('disabled');
							$('a[role=edit_button]', x.parent().parent().parent()).removeAttr('disabled');
						}

					}else{
						console.log('error');
					}
				});
			});


			$('#cancel').click(function(){
				$('#err').css('display', 'none');
			});

			$('#send-req').click(function(){
				var data = $(this).attr('val'); 
				var x = $(this).parent().parent();
				$.get('req/' + data, function(res){
					if(res == '1'){
						$('h4', x).html('Hurrayy!');
						$('p', x).html('Your request has been sent.');
						$('#send-req').hide();
					}else{
						$('h4', x).html('Oooh damn..!');
						$('p', x).html('Your request could not be sent.'+
							'<br>If this problem persists then contact the administrator.');
					}
				});

			});

			$('a[role=edit_button]').click(function(){
				if($(this).attr('disabled') == 'disabled'){
					request($(this).attr('val'));
					return;
				}
				window.location = 'edit_event/' + $(this).attr('val');
			});




			$('a[role=del_button]').click(function(response){
				if($(this).attr('disabled') == 'disabled'){
					request($(this).attr('val'));
					return;
				}
				$(this).removeClass('btn-danger');
				$(this).addClass('btn-warning');
				$(this).html('Deleting...');
				var x = $(this);

				$.get('delete/' + x.attr('val'), function(res){
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
		});

</script>

</body>
</html>