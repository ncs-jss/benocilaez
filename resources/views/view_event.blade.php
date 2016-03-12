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
                            All Events
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel-body" id="include-table">
                                        @include('table')
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
    <!-- /#wrapper -->


    <script type="text/javascript">
    if($('table tr td').length != 0)
    $('.empty').hide();

    $(document).ready(function(){

        $("#soc_select").change(function(){
            $.get('view_event/' + $('#soc_select').val(), function(response){
                $('#include-table').html(response);
            });
        });

        $('.approve').click(function(){
            var id = $(this).attr('val');
            var x = $(this);
            $.get('approve/' + id, function(res){
                if(res == '1'){
                    if(x.hasClass('btn-success')){
                        x.removeClass('btn-success');
                        x.html('Disapprove');
                        x.addClass('btn-danger');
                        $('a[role=del_button]', x.parent().parent().parent()).attr('disabled', 'disabled');
                        $('a[role=edit_button]', x.parent().parent().parent()).attr('disabled', 'disabled');
                    }else{
                        x.removeClass('btn-danger');
                        x.html('Approve');
                        x.addClass('btn-success');
                        $('a[role=del_button]', x.parent().parent().parent()).removeAttr('disabled');
                        $('a[role=edit_button]', x.parent().parent().parent()).removeAttr('disabled');
                        x.parent().parent().parent().attr('style', '');
                    }

                }else{
                    console.log('error');
                }
            });
        });



        $('a[role=edit_button]').click(function(){
            if($(this).attr('disabled') == 'disabled'){
                request($(this).attr('val'), $(this).attr('appr'));
                modalcaller = $(this).parent().parent();
                return;
            }
            window.location = 'edit_event/' + $(this).attr('val');
        });




        $('a[role=del_button]').click(function(response){
            if($(this).attr('disabled') == 'disabled'){
                modalcaller = $(this).parent().parent();
                request($(this).attr('val'), $(this).attr('appr'));
                return;
            }
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-warning');
            $(this).html('Deleting...');
            var x = $(this);

            $.get('delete/' + x.attr('val'), function(res){
                if(res == '1'){
                    x.parent().parent().remove()
                    if($('table tr td').length == 0){
                        $('.empty').show();
                    }
                }else{
                    x.html('Error');
                    x.addClass('disabled');
                    setTimeout(function(){
                        x.html('Delete');
                        x.removeClass('btn-warning');
                        x.removeClass('disabled');
                        x.addClass('btn-danger');
                    }, 2000);
                }
            });
        });
    });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

</body>

</html>
