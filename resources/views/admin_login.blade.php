<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Admin Log in</h1>
<form action="userlogin" method="post">
<label for="email">E-mail</label><br>
<input type="email" name="email" placeholder="E-mail"><br>
<label for="pwd">Password</label><br>
<input type="password" name="password" placeholder="Password">
<input type="hidden" name="_token" value="{{csrf_token()}}">

<br><input type="submit" value="submit">
</form>
</body>
</html>