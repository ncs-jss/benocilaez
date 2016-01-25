<!DOCTYPE html>
<html>
<head>
	<title>Add Society</title>
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