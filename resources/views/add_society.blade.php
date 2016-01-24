<!DOCTYPE html>
<html>
<head>
<title>Add Society</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<h1 style="text-align:center">Add Society</h1><br>
	</div>
			<div style="text-align:center">
			<form class="form-horizontal" role="form" action="register_society" method="POST">
				<div class="form-group">
					<label for="societyname" class="col-md-4 control-label">Society Name</label>
					<div class="col-md-5">
						<input type="text" name="society_name" class="form-control" placeholder="Society Name">
					</div>
				</div><br>
				<div class="form-group">
					<label for="username" class="col-md-4 control-label">User Name</label>
					<div class="col-md-5">
						<input type="text" name="username" class="form-control" placeholder="User Name">
					</div>
				</div><br>
				<div class="form-group">
					<label for="email" class="col-md-4 control-label">E-mail</label>
					<div class="col-md-5">
						<input type="email" name="email" class="form-control" placeholder="E-mail">
					</div>
				</div><br>
				<div class="form-group">
					<label for="password" class="col-md-4 control-label">Password</label>
					<div class="col-md-5">
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
				</div><br>
				<div class="col-md-7"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">Add Society</button>
                    </div>
                    <div class="col-md-5">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</div>
                </div>
			</form>
		</div>
	</div>
</body>
</html>