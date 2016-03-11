<!DOCTYPE html>
<html>
<head>
	<title>Back Office Login</title>
	<link rel="stylesheet" href="../resources/assets/css/bootstrap.min.css"/>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 style="text-align:center">Back-Office Login</h1><br>
		</div>
		<div style="text-align:center">
			<form class="form-horizontal" role="form" action="login_society" method="POST">
				<div class="form-group">
					<label for="email" class="col-md-4 control-label">Society</label>
					<div class="col-md-5">
						<input type="text" name="email" class="form-control" placeholder="User Name" required>
					</div>
				</div><br>
				<div class="form-group">
					<label for="password" class="col-md-4 control-label">Password</label>
					<div class="col-md-5">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
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
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</div>
				<div class="col-md-5">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div>
			</div>
		</form>
		<br><br><br><br><br><br>
	</div>
</div>
</body>
</html>
