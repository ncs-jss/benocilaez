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
                    <div class="panel panel-default" id="table-wrap">
                        @include('team_table')
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script type="text/javascript">
    $(document).ready(function(){
        var Events;
        $.get('../xx', function(res){
            Events = res;
            console.log(res);
        });

        $('#soc_select').change(function(){
            var val = $(this).val();

            $.get('{{$type}}/'+val, function(res){
                $('#table-wrap').html(res);
            });
        });


        $(document).on('click', 'a[role=edit_button]', function(){
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
            var name = inputs[0];
            var phone = inputs[1];
            @if($type == 1)
            var email = inputs[2];
            @else
            // var events = opt_events();
            @endif
            var roll = inputs[3];
            var zeal_id = inputs[4];

            modal.modal('show');
            @if($type == 1)
            modal.find('.email').val(email);
            @else
            modal.find('.events').html();
            @endif
            modal.find('.name').val(name);
            modal.find('.phone').val(phone);
            modal.find('.zeal').val(zeal_id);
            modal.find('.roll').val(roll);
            modal.find('#go').attr('val', $(this).attr('val'));
            modal.find('form').attr('action', "{{url('update_mem_details/')}}/"+ <?php echo $type; ?> +"/"+ $(this).attr('val'))
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

        

        $(document).on('click', '#add', function(){
            var modal = $('#myModal');
            modal.find('input').val('');
            modal.modal('show');
            modal.find('form').attr('action', "{{url('save_mem_details/')}}/{{$type}}");

        });

            $(document).on('click', '#cancel', function(){
            $('#myModal').modal('hide');
        });

        $(document).on('change', '.branch', function(){
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
