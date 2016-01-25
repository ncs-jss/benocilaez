<!DOCTYPE html>
<html>
<head>
<title>Edit Events</title>
</head>
<body>
<div class="container">
	<div class="jumbotron" style="text-align:center">
		<h1>Edit Events</h1>
	</div>
</div>
<div class="container">
		<div style="text-align:center">
			<form class="form-horizontal" role="form" action=" " method="POST">
				<div class="form-group">
				<label for="event_name" class="col-md-4 control-label">Event Name</label>
					<div class="col-md-5">
						<input type="text" name="event_name" class="form-control" placeholder="Event Name">
					</div>
				</div><br>
				<div class="form-group">
					<label for="eventdesc" class="col-md-4 control-label">Event Description</label>
					<div class="col-md-5">
						<textarea rows="5" name="event_description" class="form-control"></textarea>
					</div>
				</div><br>
				<div class="form-group">
					<label for="time" class="col-md-4 control-label">Timing</label>
					<div class="col-md-5">
						<input type="datetime" name="timing" class="form-control" placeholder="Timing">
					</div>
				</div><br>
				<div class="form-group">
					<label for="winners" class="col-md-4 control-label">Number of Winners:</label>
					<div class="col-md-5">
						<input type="text" name="winners" class="form-control" placeholder="Number of Winners">
					</div>
				</div><br>
				<div class="col-md-7"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-info btn-block">Edit</button>
                    </div>
                </div>
			</form>
	</div>
</body>
</html>