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
                            Core Team
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Edit Member Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" id="form1" action="{{url('save_mem_details')}}" method="get">
                                                        <div class="form-group">
                                                            <label>Member Name</label>
                                                            <input type="text" name="name" placeholder="Member Name" class="form-control name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Member email</label>
                                                            <input type="email" name="email" placeholder="E-mail" class="form-control pass" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Member Contact Number</label>
                                                            <input type="text" name="phone" placeholder="Phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57')" class="form-control pass" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Branch/ Course</label>
                                                            <select name ="branch" class="branch form-control">
                                                                <option value="-">-</option>
                                                                <option value="CS">CS</option>
                                                                <option value="EC">EC</option>
                                                                <option value="CE">CE</option>
                                                                <option value="ME">ME</option>
                                                                <option value="EE">EE</option>
                                                                <option value="EEE">EEE</option>
                                                                <option value="IT">IT</option>
                                                                <option value="IC">IC</option>
                                                                <option value="MT">MT</option>
                                                                <option value="MCA">MCA</option>
                                                                <option value="MBA">MBA</option>
                                                                <option value="MTECH">MTECH</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Year</label>
                                                            <select name = "year" class="year form-control">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="type" value="1" class="form-control">
                                                        </div>
                                                        

                                                    <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" id="go" for='form1' class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel-body" id="include-table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Member Name</th>
                                                        <th>Phone no.</th>
                                                        <th>Email</th>
                                                        <th>Branch/Yr</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $members as $mem)
                                                    <tr>
                                                        <td>{{ $mem['name'] }}</td>
                                                        <td>{{ $mem['phone'] }}</td>
                                                        <td>{{ $mem['email'] }}</td>
                                                        <td>{{ $mem['branch_yr'] }}</td>
                                                        <td><a class="btn btn-default btn-xs"
                                                            val="{!! $mem['id'] !!}"
                                                            role="edit_button">
                                                            Edit</a>
                                                        </td>
                                                        <td><a class="btn btn-danger btn-xs"
                                                            val="{!! $mem['id'] !!}"
                                                            role="del_button">
                                                            Delete</a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-default" id="add">Add Member</button>

                                        </div>
                                        <!-- /.table-responsive -->

                                    </div>
                                    <!-- /.panel-body -->

                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
    <script type="text/javascript">
    $(document).ready(function(){
        $('a[role=edit_button]').click(function(){
            var modal = $('#myModal');
            var soc = $(this).parent().parent().find('td').html();
            console.log(soc);
            modal.modal('show');
            modal.find('.name').val(soc);
            modal.find('#go').attr('val', $(this).attr('val'));
        });
        $('a[role=del_button]').click(function(){
            var tr = $(this).parent().parent();
            $.get('del_soc/'+$(this).attr('val'), function(res){
                if(res == 1){
                    tr.remove();
                }else{

                }
            });
        });


        $('#add').click(function(){
            var modal = $('#myModal');
            modal.find('input').val('');
            modal.modal('show');

        });

        $('#cancel').click(function(){
            $('#myModal').modal('hide');
        });

        $('.branch').change(function(){
            var val = $(this).val();
            var year = $('.year');

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

    });
    </script>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

</body>

</html>
