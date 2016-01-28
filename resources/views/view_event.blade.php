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
	<script type="text/javascript">
	$(document).ready(function(){
		$("#soc_select").change(function(){
			$.get('view_event/' + $('#soc_select').val(), function(response){
				$('#table-container').html(response);
			});
		});
	});
	</script>

	<div class="container">
		<div class="col-md-2" style="float:left">
			@if ($admin == 1)
			<select style="font-size:1.2em" class="form-control" id="soc_select">
				@foreach ($societies as $data)
				<option value='{{ $data->id }}'>{{ $data->society }}</option>
				@endforeach
			</select>
			@else
			<p>{{ $accessor }}</p>
			@endif
			<br>
		</div>
		<div style="text-align:center" class="table-reponsive" id='table-container'>
		@include('table')
		</div>
	</div><br><br><br><br>
</body>
</html>