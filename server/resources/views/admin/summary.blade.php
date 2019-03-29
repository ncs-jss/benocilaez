<!DOCTYPE html>
<html>
<head>
    <title>Zealicon Report</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <h1 class="font-weight-bold" style="text-align: center; text-decoration: underline;">Zealicon Report</h1>
        <br>
        <h2>This report includes the detailed description of the annual techno-cultural fest Zealicon of Jss Academy of Technical Education, Noida.</h2><br>
        <ul>  
            <li><h3 class="font-weight-bold"><li>Total Number of Active Events : {{ $events->count() }}</li></h3>
            <h3 class="font-weight-bold"><li>Total Number of participating Societies : {{ $societies->count() }}</li></h3>
            <h3 class="font-weight-bold"><li>Total Number of CTCs : 21</li></h3>
            <h3 class="font-weight-bold"><li>Total Number of Registrations : 1911</li></h3>
        </ul>
        @php
        $count=1;
        @endphp
        <br>
        <h2 class="font-weight-bold">Society Member Details:</h2>
        @foreach($societies as $society)
        <h3>{{ $count++ }}. {{ $society->name }}</h3>
        <br>
        <table class="table table-bordered w-50">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Member</th>
                    <th scope="col">Category</th> 
                    <th scope="col">Branch</th>
                    <th scope="col">Zeal Id</th>               
                </tr>
            </thead>
            <tbody>
                @php
                $c=1;
                @endphp
                @foreach($society->members as $member)
                <tr>
                    <td>{{ $c++ }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->memberType->name }}</td>
                    <td>{{ $member->branch->branch }}</td>
                    <td>{{ $member->zeal_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        @endforeach
        @php
        $count=1;
        @endphp
        <br>
        <h2 class="font-weight-bold">Event Winner Details:</h2>
        @foreach($societies as $society)
        <h3>{{ $count++ }}. {{ $society->name }}</h3>
        <br>
        @php
        $t = 1;
        @endphp
        @foreach($society->events as $event)
        <table class="table table-bordered w-50">
            <h4 class="font-weight-bold">Winner Details:</h4>
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Event</th>
                    <th scope="col">Winner/Runner Up</th>
                    <th scope="col">Winner/Runner Up Amount</th> 
                    <th scope="col">Contact No.</th>
                    <th scope="col">Zeal Id</th>               
                </tr>
            </thead>
            @php
            $a = 1;
            @endphp
            @php
            $e = 0;
            @endphp
            <tbody>
                @foreach($event->winners as $winner)
                <tr>
                    @if($e == 0)
                    <td>{{ $t++ }}</td>
                    <td>{{ $event->name }}</td>
                    @else
                    <td> </td>
                    <td> </td>
                    @endif
                    <td>{{ $winner->name }}</td>
                    <td>{{ ${'event'}->{'winner' . $a++} }}</td>
                    <td>{{ $winner->contact_no }}</td>
                    <td>{{ $winner->zeal_id }}</td>
                </tr>
                @php
                $e++;
                @endphp
                @endforeach
            </tbody>
        </table>
        @endforeach
        @endforeach
        <br>
        <h2 class="font-weight-bold">Events Details:</h2>
        @php
            $w =1;
        @endphp
        @foreach($events as $event)
        <table class="table table-bordered w-50">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Winner Amount</th> 
                    <th scope="col">Runner Up Ammount</th>
                    <th scope="col">Contact Person</th> 
                    <th scope="col">Contact No.</th>               
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $w++ }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->winner1 }}</td>
                    <td>{{ $event->winner2 }}</td>
                    <td>{{ $event->contact_name }}</td>
                    <td>{{ $event->contact_no }}</td>
                </tr>
            </tbody>
            
        </table>
        @endforeach
    </div>
</body>
</html>