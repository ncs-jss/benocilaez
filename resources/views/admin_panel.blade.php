<!DOCTYPE html>
<html lang="en">
@include('header')
<body>
    
    <div id="wrapper">
        @include('navigation')

<script type="text/javascript">
    $(document).ready(function(){

        

        $('.feature').click(function(){
            var what = $(this).attr('what');
            var button = $(this);
            button.html('WORKING...');
            a = ['ADD EVENTS', 'ADD WINNERS','ADD MEMBERS'];
            $.get('enable_feature/'+what, function(response){
                if(response == 1){
                    button.html('DISABLE ' + a[what]);
                    button.removeClass('btn-danger');
                    button.addClass('btn-success');
                    if(what == 1 || what == 2 || what == 0){
                        window.location.href = window.location.href
                    }
                }else if(response == 0){
                    button.html('ENABLE ' + a[what]);
                    button.removeClass('btn-success');
                    button.addClass('btn-danger');
                    if(what == 1 || what == 2 || what == 0){
                        window.location.href = window.location.href
                    }
                }else{
                    var x = button.hrml();
                    button.html('ERROR...TRY AGAIN...');
                    setTimeout(function(){
                        button.html(x);
                    }, 1000);
                }
            });
        });
    });
</script>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">{{ $action }}</h2>
                </div>
            </div>
            <div class="buttons" style="float:right">
                @if ($admin == 1)
                 @if($add_events == 0)
                <button type="button" what='0' class="btn btn-danger feature">
                    ENABLE ADD EVENTS
                </button>
                @else
                <button type="button" what='0' class="btn btn-success feature">
                    DISABLE ADD EVENTS
                </button>
                @endif
                @if($add_winners == 0)
                <button type="button" id="feature" what='1' class="btn btn-danger feature">
                    ENABLE ADD WINNERS
                </button>
                @else
                <button type="button" id="feature" what='1' class="btn btn-success feature">
                    DISABLE ADD WINNERS
                </button>
                @endif
                @if($add_members == 0)
                <button type="button" what='2' class="btn btn-danger feature">
                    ENABLE ADD MEMBERS
                </button>
                @else
                <button type="button" what='2' class="btn btn-success feature">
                    DISABLE ADD MEMBERS
                </button>
                @endif
                 </div>
            <br><br>
                @endif

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
                                                    <form role="form" action = "edit_soc">
                                                        <div class="form-group">
                                                            <label>Society Name</label>
                                                            <input type="text" name="event_name" placeholder="Event Name" class="form-control name" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Society Password</label>
                                                            <input type="text" name="password" placeholder="Password" class="form-control pass" >
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" name="_token" class='_token' value="{{ csrf_token() }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" value ="" id ="socid" name="socid" >
                                                        </div>
                                                        <div class="alert success alert-success" style="display:none">
                                                            <p>
                                                                Success!!
                                                            </p>
                                                        </div>
                                                        <div class="alert err alert-danger" style="display:none">
                                                            <p>
                                                                Failed!!
                                                            </p>
                                                        </div>
                                                    </form>
                                                    <div class="modal-footer">
                                                        <button type="button"  id="go" class="btn btn-primary">Save changes</button>
                                                        <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
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
                                                        <th>#Coordinators</th>
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
                modal.find('#socid').val($(this).attr('val'));
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
                    socid: $('#myModal #socid').val(),
                }
                console.log(data);

                $.post('edit_soc', data, function(res){
                    console.log(res);
                    if(res.status == 1){
                         modal.find('.success').show();
                        window.setTimeout(function(){
                            window.location.href = window.location.href;
                        }, 1000);
                    }else{
                        modal.find('.err').show();
                        window.setTimeout(function(){
                            modal.find('.success').hide();
                        }, 1000);
                    }
                });
 
            });
            $('#cancel').click(function(){
                $('#myModal').modal('hide');
            });
        });
            $(document).ready(function(){
                $('#enable_event').click(function(){
                 $.ajax({
                url: '{{URL::asset('/admin')}}',
                data: {val: 1},
                type: 'GET'
            });

       
            })); 
    });
        $(document).ready(function(){
        $('#disable_event').click(function(){
        $.ajax({
                url: '{{URL::asset('/admin')}}',
                data: {val: 0},
                type: 'GET'
                });
               
            }); 
});
        $(document).ready(function(){
        $('#enable_winner').click(function(){
           
                $.ajax({
                url: '{{URL::asset('/admin')}}',
                data: {value: 1},
                type: 'GET'
            }); 
        });
    });
        $(document).ready(function(){
        $('#disable_winner').click(function(){
            
                $.ajax({
                url: '{{URL::asset('/admin')}}',
                data: {value: 0},
                type: 'GET'
            }); 
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
