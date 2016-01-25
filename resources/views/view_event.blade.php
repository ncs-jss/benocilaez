<!DOCTYPE html>
<html>
<head>
	<title>Veiw Events</title>
	<style type="text/css">
	.event{
		padding-top: 5em;
	}
	</style>
</head>
<body>
	@include('header')
	<div class="container">
		<div class="col-md-2" style="float:left">
    	@foreach ($societies as $data)
		<select style="font-size:1.2em" class="form-control">
  			<option>{{ $data['society_name'] }}</option>
 		 	<option>{{ $data['society_name'] }}</option>
  			<option>{{ $data['society_name'] }}</option>
  			<option>{{ $data['society_name'] }}</option>
  			<option>{{ $data['society_name'] }}</option>
		</select><br>
		</div>
		<div style="text-align:center" class="table-reponsive">
			<table class=" table table-bordered">
				<tr>
					<th style="width:5%">#</th>
					<th class="col-md-2">Event Name</th>
					<th class="col-md-6">Event Description</th>
					<th class="col-md-1">Approved?</th>
					@if($data['society_name'] == $accessor)
					<th class="col-md-1">Edit</th>
					<th class="col-md-1">Delete</th>
					@endif
				</tr>
				<?php $i=0; ?>
				@foreach ( $data['society_events'] as $event)
				<?php $i++; ?>
				<tr>
					<td>{{ $i }}</td>
					<td>{{ $event->event_name }}</td>
					<td>{{ $event->event_description }}</td>
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
					@if($data['society_name'] == $accessor)
					<td><a class="btn btn-info btn-xs" 
						href="#" 
						role="button" 
						{{ ($event->approved == 0 ) ? '' 
						: "disabled='disabled'" }} >
						Edit</a>
					</td>

					<td><a class="btn btn-danger btn-xs" 
						href="#" 
						role="button" 
						{{ ($event->approved == 0 ) ? '' 
						: "disabled='disabled'" }}>
						Delete</a>
					</td>
					@endif
				</tr>
				@endforeach
			</table>	
		</div>
		@endforeach
	</div><br><br><br><br><br><br>
</body>
</html>