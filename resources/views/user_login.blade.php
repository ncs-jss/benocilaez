<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript"></script></head>
<body>
<h1>User Log in</h1>
<form action="" method="post">
<label for="email">E-mail</label><br>
<input type="email" name="email" placeholder="E-mail"><br>
<label for="pwd">Password</label><br>
<input type="password" name="password" placeholder="Password">
<input type="hidden" value="{{csrf_token()}}">
<br><input type="submit" value="submit">
<br>
<a href="{{URL::asset('user_signup')}}"> Not Yet Registered?</a>
</form>
</body>
</html>
