<!DOCTYPE html>
@include('header')
<html>
<head>
    <script type="text/javascript" src="../resources/assets/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="../resources/assets/css/bootstrap-multiselect.css" type="text/css"/>
</head>
<style media="screen">
.table :nth-child(1){
    width: 30%
}
.table :nth-child(2){
    width: 15%
}
.table :nth-child(3){
    width: 10%
}
.table :nth-child(4){
    width: 30%
}
.table :nth-child(5){
    width: 15%
}


</style>
@include('soc_details_js')
<body>
    <div class="container-fluid">
        <div class="col-md-2" style="float:right">
            @if ($admin == 1)
            <select style="font-size:1.2em" class="form-control" id="soc_select">
                @foreach ($societies as $data)
                <option value='{{ $data->id }}'>{{ $data->society }}</option>
                @endforeach
            </select>
            @else
            <p>{{ $accessor }}</p>
            @endif
            <br>
        </div>
        <div style="text-align:center" class="table-reponsive" id='table-container'>
            @include('details_table')
        </div>
    </div>
</div>
</body>
</html>
