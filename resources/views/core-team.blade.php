<!DOCTYPE html>
<html lang="en">
@include('header')
<body>
    <script type="text/javascript">
        $('.branch').change(function(){
            var val = $(this).val();
            var year = $(this).siblings();

            if(val == 'MBA' || val == 'MTECH' ){
                year.html(opt_year_o(3));
            }else if(val == 'MCA'){
                year.html(opt_year_o(4));
            }else if(val == '-'){
                year.html(opt_year_o(1));
            }else {
                year.html(opt_year_o(5))
            }
        });

        function opt_year_o(yr){
            var x = 5;
            var str = '';
            if(yr){
                x = yr;
            }
            for (var i = 1; i < x; i++) {
                str += '<option value=' + i + '>';
                str += i;
                str += '</option>';
            }
            return str;
        }
    </script>

    <div id="wrapper">
        @include('navigation')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">{{ $action }}</h2>
                    @if ($admin == 1)
        			<select style="font-size:1.2em" class="form-control" id="soc_select">
        				@foreach ($societies as $data)
        				<option value='{{ $data->id }}'>{{ $data->society }}</option>
        				@endforeach
        			</select>
                    <br>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            Add Core Team Members
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <form role="form" action="add_event" method="post">
                                        <div class="form-group">
                                            <label>Member Name</label>
                                            <input type="text" name="name" placeholder="Member Name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="E-mail" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Course/ Branch</label>
                                            <select class="form-control" name="branch">
                                                <option value="-">-</option>
                                                <option value="CS">CS</option>
                                                <option value="EC">EC</option>
                                                <option value="CE">CE</option>
                                                <option value="ME">ME</option>
                                                <option value="EE">EE</option>
                                                <option value="IT">IT</option>
                                                <option value="IC">IC</option>
                                                <option value="MT">MT</option>
                                                <option value="EEE">EEE</option>
                                                <option value="MCA">MCA</option>
                                                <option value="MBA">MBA</option>
                                                <option value="MTECH">MTECH</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Year</label>
                                            <select class="form-control" name="year">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
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
                                <!-- /.col-lg-6 -->
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

</body>

</html>
