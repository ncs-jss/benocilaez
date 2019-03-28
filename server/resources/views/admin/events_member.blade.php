<!DOCTYPE html>
<html>
<head>
    <title>Events Winners</title>

     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <h1 style="text-align: center;">Events Member List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Society</th>
                <th scope="col">Member</th>
                <th scope="col">Category</th>                
            </tr>
        </thead>
        <tbody>
            @php
                $c=0;
            @endphp
            @foreach($societies as $society)
            @foreach($society->members as $member)
                <tr>
                    @if($c == 0)
                    <td>{{ $society->name }}</td>
                    @else
                    <td></td>
                    @endif
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->memberType->name }}</td>
                </tr>
                @php
                    $c = 1;    
                @endphp
            @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>