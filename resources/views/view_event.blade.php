<!DOCTYPE html>
<html>
<head>
	<title>Veiw Events</title>
</head>
<body>
	@include('header')
	<div class="container">
		<div class="jumbotron" style="text-align:center">
			<h1>Veiw Events</h1>
		</div>
	</div>
	<div class="container">
		@foreach ($societies as $data)
		<h1>{{ $data['society_name'] }}</h1>
		<div style="text-align:center">
			<table class=" table table-bordered">
				<tr>
					<th class="col-md-1">#</th>
					<th class="col-md-1">Event Id</th>
					<th class="col-md-2">Event Name</th>
					<th class="col-md-5">Event Description</th>
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
					<td>{{ $event->event_id }}</td>
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