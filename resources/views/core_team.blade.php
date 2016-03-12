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

            @include('team_table')
        </div>

    </div>
    <script type="text/javascript">
    $(document).ready(function(){
        var Events;
        $.get('../xx', function(res){
            Events = res;
            console.log(res);
        });



        $('a[role=edit_button]').click(function(){
            var modal = $('#myModal');
            var x = $(this).parent().parent().find('td');
            var inputs = [];
            x.each(function(key){
                if (x.hasOwnProperty(key)) {
                    var z = x[key];
                    inputs.push(z.innerHTML);
                }
            });
            console.log(inputs);
            var bryr = inputs[3].split(' ');
            var br = bryr[0];
            var yr = bryr[1];

            var name = inputs[0];
            var phone = inputs[1];
            @if($type == 1)
            var email = inputs[2];
            @else
            //var events = opt_events();
            @endif


            modal.modal('show');
            @if($type == 1)
            modal.find('.email').val(email);
            @else
            modal.find('.events').html();
            @endif
            modal.find('.name').val(name);
            modal.find('.phone').val(phone);
            modal.find('.branch').val(br);
            modal.find('.year').val(yr);
            modal.find('#go').attr('val', $(this).attr('val'));
            modal.find('form').attr('action', "{{url('update_mem_details/')}}/"+ $(this).attr('val'))
        });

        function get_event_names(parent, events){
            var option = parent.find('.events option');
            var arr = [];
            option.each(function(x){
                if(events.indexOf($(this).attr('value')) != -1){
                    arr.push($(this).html());
                }
            });
            return arr.toString();
        }

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
            modal.find('form').attr('action', "{{url('save_mem_details/')}}/{{$type}}");

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
