<!DOCTYPE html>
<html>
<head>
    <title>Registration Details</title>

     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Event</th>
                <th scope="col">Rank</th>
                <th scope="col">Winner</th>
                <th scope="col">Zeal ID</th>
                <th scope="col">Contact No.</th>
            </tr>
        </thead>
        <tbody>
            @foreach($winners as $winner)
                <tr>
                    <th>{{ $winner->event->name }}</th>
                    <th>{{ $winner->rank }}</th>
                    <th>{{ $winner->name }}</th>
                    <th>{{ $winner->zeal_id }}</th>
                    <th>{{ $winner->contact_no }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>