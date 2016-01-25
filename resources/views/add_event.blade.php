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
.sdesc{
	width: 100%;
	height:60px;
}

</style>
</head>
<body>
@include('header')
<div class="container">
		<div style="text-align:center">
			<form class="form-horizontal" role="form" action="add_event" method="POST">
				<div class="form-group">
				<label for="event_name" class="col-md-4 control-label">Event Name</label>
					<div class="col-md-5">
						@if($action == 'Add Event')
						<input type="text" name="event_name" class="form-control">
						@else
						<p>{{ $event_name }}<p>
						@endif
					</div>
				</div><br>
				<div class="form-group">
					<div class="col-md-3"></div>
					<div class="col-md-7">
						<textarea class="sdesc" rows="5" name="short_description" class="form-control" placeholder="A Short Description of Your Event..."></textarea>
					</div>
				</div><br>
				<div class="form-group">
					<div class="col-md-3"></div>
					<div class="col-md-7">
						<textarea class="desc" id="editor1" name="editor1">Your Event's Description Here...</textarea>
						<script type="text/javascript">
							CKEDITOR.replace( 'editor1' );
						</script>
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
	</div>
</body>
</html>