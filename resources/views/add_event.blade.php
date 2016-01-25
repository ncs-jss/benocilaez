<!DOCTYPE html>
<html>
<head>
	<title>Add Events</title>
	<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
	<style>
	.desc{
		width:150%;
		height:200px; 
	}
	</style>
</head>
<body>
	@include('header')

	<script type="text/javascript">
	
	$(document).ready(function(){
		var i = 1;
		$('#add_rule').click(function (){
			$('#rule_group').append('<div class="col-md-2"></div>'
									+'<div class="col-md-8" id="rule_group">'
										+'<div class="input-group rule-'+ (++i) +'">'
											+'<span class="input-group-addon" id="basic-addon1">'
											+ i + '</span>'
											+'<input type="text" class="form-control" placeholder="Rules" aria-describedby="basic-addon1">'
										+'</div>'						
									+'</div>'
									+'<div class="col-md-1">'
										+'<button type="button" class="btn btn-danger" id="del_rule" rule="'
											+i
											+'" aria-label="Left Align">'
											+'<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'
										+'</button>'
									+'</div>') ;

		});

		$('#del_rule').click(function(){

		});

	});	

	</script>

	<div class="container">
		<div style="text-align:center">
			<form class="form-horizontal" role="form" action="add_event" method="POST">
				<div class="form-group">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						@if($action == 'Add Event')
						<input type="text" name="event_name" class="form-control" placeholder="Event Name">
						@else
						<p>{{ $event_name }}<p>
							@endif
						</div>
					</div><br>
					<div class="form-group">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<input type="text" name="short_description" class="form-control" placeholder="A Short Description of Your Event..."></textarea>
						</div>
					</div><br>
					<div class="form-group">
						<p><b>Event description:</b></p>
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<textarea class="desc" id="editor1" name="editor1">Your Event's Description Here...</textarea>
							<script type="text/javascript">
							CKEDITOR.replace( 'editor1' );
							</script>
						</div> 
					</div><br>
					<div class="form-group" id='rule_group'>
						<p><b>Rules:</b></p>
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="input-group rule-1">
								<span class="input-group-addon" id="basic-addon1">1</span>
								<input type="text" class="form-control" placeholder="Rules" aria-describedby="basic-addon1">
							</div>						
						</div>
						<div class="col-md-1">
							<button type="button" class="btn btn-primary" id="add_rule" aria-label="Left Align">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
						</div>
					</div><br>
					<div class="form-group">
						<label for="time" class="col-md-4 control-label">Time</label>
						<div class="col-md-2">
							<input type="time" name="time" class="form-control">
						</div>
						<label for="date" class="col-md-1 control-label">Date</label>
						<div class="col-md-2">
							<input type="date" name="date" class="form-control">
						</div>
					</div><br>
					<div class="form-group">
						<label for="contact" class="col-md-4 control-label">Contacts</label>
						<div class="col-md-2">
							<input type="text" name="contact_name" class="form-control" placeholder="Name">
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-2">
							<input type="text" name="conatct_number" class="form-control" placeholder="Number">
						</div>
					</div><br>
					<div class="form-group">
						<div class="col-md-4"></div>
						<div class="col-md-2">
							<input type="text" name="contact_name" class="form-control" placeholder="Name">
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-2">
							<input type="text" name="conatct_number" class="form-control" placeholder="Number">
						</div>
					</div><br>
					<div class="form-group">
						<label for="prize_money" class="col-md-4 control-label">Prize Money</label>
						<div class="col-md-2">
							<input type="text" name="prize_money" class="form-control" placeholder="Fisrt Prize">
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-2">
							<input type="text" name="conatct_number" class="form-control" placeholder="Second Prize">
						</div>
					</div><br>
					<div> {{ $err }}</div>
					@if($errors->has())
					@foreach ($errors->all() as $error)
					<div>{{ $error }}</div>
					@endforeach
					@endif
					<div class="col-md-7"></div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-primary btn-block">{{ $action }}</button>
					</div>
				</div>
				<div class="col-md-5">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div>
			</form>
			<br><br><br><br><br><br>
		</div>
	</body>
	</html>