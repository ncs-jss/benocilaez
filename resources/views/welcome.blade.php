<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Elastic Heart</title>
    <meta name="google-signin-client_id" content="1024750123636-4m9cf0ra6js17fkci5gkpbr9ajeq1k91.apps.googleusercontent.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</head>

<style type="text/css">
    body, html{
        height: 100%
    }
    .container{
        margin-top: 5%;
    }
</style>

<body>
    <div class = 'container'>
        <a  href="{{ route('social_login', ['google']) }}"><img src="{{URL::asset('assets/img/login.png')}}"></a>
        <a  href="{{route('social_login', ['facebook'])}}"><img src="{{URL::asset('assets/img/fblog.png')}}"></a>
     </div>
</body>

</html>
