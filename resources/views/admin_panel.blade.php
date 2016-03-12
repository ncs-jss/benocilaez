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
                            All Events
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Edit Society Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" >
                                                        <div class="form-group">
                                                            <label>Society Name</label>
                                                            <input type="text" name="event_name" placeholder="Event Name" class="form-control name" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Society Password</label>
                                                            <input type="text" name="password" placeholder="Password" class="form-control pass" >
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="_token" class="form-control _token" value="{{ csrf_token() }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" id="go" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>


                                    <div class="panel-body" id="include-table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Society Name</th>
                                                        <th>#CTC</th>
                                                        <th>#Coordinators?</th>
                                                        <th>#Volunteers</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $details as $soc)
                                                    <tr>
                                                        <td>{{ $soc['society'] }}</td>
                                                        <td>{{ $soc['ctc'] }}</td>
                                                        <td>{{ $soc['coordinator'] }}</td>
                                                        <td>{{ $soc['volunteer'] }}</td>
                                                        <td><a class="btn btn-default btn-xs"
                                                            val="{!! $soc['soc_id'] !!}"
                                                            role="edit_button">
                                                            Edit</a>
                                                        </td>
                                                        <td><a class="btn btn-danger btn-xs"
                                                            val="{!! $soc['soc_id'] !!}"
                                                            role="del_button">
                                                            Delete</a>
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
        $('#go').click(function(){
            var modal = $('#myModal');
            var data = {
                name: $('#myModal .name').val(),
                password: $('#myModal .pass').val(),
                _token:  $('#myModal ._token').val(),
            }
            console.log(data);
            $.post('edit_soc/'+$(this).attr('val'), data, function(res){
                console.log(res);
                if(res.status == '1'){

                }else{
                    modal.find('._token').val(res._token);
                }
            });
            window.location.href = window.location.href;
        });
        $('#cancel').click(function(){
            $('#myModal').modal('hide');
        });

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
