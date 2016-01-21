<!DOCTYPE html>
<html>
<head>
</head>
<style>
</style>
<body>
<a href=#>logout</a>
<h1>Admin dashboard</h1>
<img src=""alt="no image">
<p>hey
<?php
?>
</p>
<p>Your events are:</p>
<a href="">Event 1</a>
<a href="">Event 2</a>
<a href="">Event 3</a>
<a href="">Event 4</a>
<form>
	<label for="eventid">Event id</label><br>
	<input type="text" name="event_id"><br>
	<label for="event_name">Event name</label><br>
	<input type="text" name="event_name"><br>
	<label for="event_desc">Event Description</label><br>
	<input type="text" name="event_description"><br>
	<label for="starttime">Start Time</label><br>
	<input type="datetime" name="start_time"><br>
	<label for="endtime">Event Description</label><br>
	<input type="datetime" name="end_time"><br>
	<label for="winner">Winner</label><br>
	<input type="text" name="winner"><br>
	<label for="1strunner">1st Runner Up</label><br>
	<input type="text" name="runner1"><br>
	<label for="2ndrunner">2nd Runner Up</label><br>
	<input type="text" name="runner2"><br>
	<label for="rules">Rules</label><br>
	<input type="text" name="rules"><br>
<input type="hidden" value="{{csrf_token()}}">
	
<br><input type="submit" value="Edit Event Details">
</form>
</body>
</html>