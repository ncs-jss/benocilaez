<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>User Sign up</h1>
<form action="usersignup" method="post">
<label for="name">Full Name</label><br>
<input type="text" name="name" placeholder="Full Name"><br>
<label for="email">E-mail</label><br>
<input type="email" name="email" placeholder="E-mail"><br>
<label for="year">Year</label><br>
<select name="year">
  <option value="1">First</option>
  <option value="2">Second</option>
  <option value="3">Third</option>
  <option value="4">Fourth</option>
</select>
<br>
<label for="college">College</label><br>
<input type="text" name="college" placeholder="College"><br>
<label for="branch">Branch</label><br>
<input type="text" name="branch" placeholder="Branch"><br>
<label for="contact">Contact</label><br>
<input type="text" name="contact" placeholder="Contact"><br>
<label for="pwd">Password</label><br>
<input type="password" name="password" placeholder="Password">
<br><label for="cnfpwd">Confirm Password</label><br>
<input type="password" name="password_confirmation" placeholder="Confirm Password">
<input type="hidden" name="_token" value="{{csrf_token()}}">

<br><input type="submit" value="submit">
</form>
</body>
</html>