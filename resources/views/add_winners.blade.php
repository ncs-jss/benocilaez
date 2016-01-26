<!DOCTYPE html>
<html>
<head>
<title>Add Winners</title>
<style>
.help
{
	font-size:10px;
}
</style>
</head>
<body>
@include('header')
<script type="text/javascript">
	
	$(document).ready(function(){
	var i=1;
	$("#add_winner").click(function(){
		$("#winner-group").append('<br><label for="winner" class="col-md-4 control-label">Winner</label>'+
					'<div class="col-md-5">'
						+'<input type="text" name="winner" class="form-control" placeholder="Winner">'+
					'</div>'
					+'<div class="col-md-1">'
				+'<button type="button" class="btn btn-danger" id="del_winner">'
  					+'<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'
				+'</button>'
				+'</div>');



	});



});




</script>
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
					<label for="eventid" class="col-md-4 control-label">Event ID</label>
					<div class="col-md-5">
						<input type="text" name="event_id" class="form-control" placeholder="Event ID">
					</div>
				</div><br>
				<div class="form-group" id = "winner-group">
					<label for="winner" class="col-md-4 control-label">Winner</label>
					<div class="col-md-5">
						<input type="text" name="winner" class="form-control" placeholder="Winner">
					</div>
				<div class="col-md-1">
				<button type="button" class="btn btn-info btn-sm" id="add_winner">
  					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				</button>
				</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="runner1" class="col-md-4 control-label">1st Runner Up</label>
					<div class="col-md-5">
						<input type="text" name="runner_up1" class="form-control" placeholder="1st Runner Up">
					</div>
				<div class="col-md-1">
				<button type="button" class="btn btn-info btn-sm" id="add_runner1">
  					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				</button>
				</div>
				</div>
				<br><br>
				<div class="form-group">
					<label for="runner2" class="col-md-4 control-label">2nd Runner Up</label>
					<div class="col-md-5">
						<input type="text" name="runner_up2" class="form-control" placeholder="2nd Runner Up">
					</div>
					<div class="col-md-1">
					<button type="button" class="btn btn-info btn-sm" id="add_runner2">
  						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button>
					</div>
				</div>
				<br><br>
				<div class="help">
				<p>The names of winners once added shall not be changed.</p>
				</div>
				<div class="col-md-7"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">Add</button>
                    </div>
                </div>
    		</form>
	</div><br><br><br><br><br><br>
</body>
</html>