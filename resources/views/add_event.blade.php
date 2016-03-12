<!DOCTYPE html>
<html lang="en">
@include('header')
<body>

    <div id="wrapper">
        @include('navigation')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">{{ $action }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            Details of your Event...
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <form role="form" action="add_event" method="post">
                                        <div class="form-group">
                                            <label>Event Name</label>
                                            <input type="text" name="event_name" placeholder="Event Name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Short description of the event</label>
                                            <textarea class="form-control" name="short_des" rows="3" id="editor1"></textarea>
                                            <script type="text/javascript">
                                            CKEDITOR.replace('editor1');
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </div>
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <button type="submit" class="btn btn-default">Add Event</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

</body>

</html>
