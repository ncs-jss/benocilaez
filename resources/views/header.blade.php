<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zealicon'16 BackOffice | {{ $action }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('components/metisMenu/dist/metisMenu.min.css') }}"
    rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}"
    rel="stylesheet" type="text/css">

    <script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>

    @if($action == 'Add Event')
    <script src="http://cdn.ckeditor.com/4.5.6/basic/ckeditor.js"></script>
    @endif

</head>
