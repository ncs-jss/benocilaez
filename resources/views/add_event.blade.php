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

                                    @if($action == 'Add Event')
                                    <form role="form" action="{{route('event_creation')}}" method="post" enctype="multipart/form-data">
                                        @else
                                        <form role="form" action="{{route('edit', $id)}}" method="post" enctype="multipart/form-data">
                                            @endif
                                            <div class="form-group">
                                                <label>Event Name</label>
                                                @if($edit == 1)
                                                <input type="text" name="event_name" value="{{ $event_name }}" placeholder="Event Name" class="form-control" required>
                                                @else
                                                <input type="text" name="event_name" placeholder="Event Name" class="form-control" required>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Short description of the event</label>
                                                <textarea class="form-control" name="short_des" rows="3" id="editor1"></textarea>
                                                <script type="text/javascript">
                                                CKEDITOR.replace('editor1');
                                                @if($edit == 1)
                                                CKEDITOR.instances['editor1']
                                                .setData({!! $event_des !!});
                                                @endif
                                                </script>
                                            </div>

                                            @if ($add_events == 1)

                                            <div class="form-group">
                                                <label>Long description of the event</label>
                                                <textarea class="form-control" name="long_des" rows="3" id="editor2"></textarea>
                                                <script type="text/javascript">
                                                CKEDITOR.replace('editor2');
                                                @if($edit == 1)
                                                CKEDITOR.instances['editor2']
                                                .setData({!! $long_des !!});
                                                @endif
                                                </script>
                                            </div>
                                            <div class="form-group rules" style="text-align:center">
                                                <p class="control-label"><b>Rules:</b></p>
                                                @if($action == 'Add Event')
                                                <div class="rule-1 row x">
                                                    <div class="col-md-11">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="rulenumber">1</span>
                                                            <input type="text" class="form-control event_rule" placeholder="Rules" aria-describedby="basic-addon1" name="rules[]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 plus">
                                                        <button type="button" class="btn btn-primary add_rule" aria-label="Left Align">
                                                            <span class="glyphicon glyphicon-plus chod" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                                                    <br><br>
                                                </div>
                                                @else
                                                <?php $i = 1; ?>
                                                @foreach(json_decode($rules) as $rule)
                                                <div class="rule-{{$i}} row x">
                                                    <div class="col-md-11">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="rulenumber">{{$i}}</span>
                                                            <input type="text" class="form-control event_rule" placeholder="Rules" aria-describedby="basic-addon1" name="rules[]" value="{{$rule}}">
                                                        </div>
                                                    </div>
                                                    @if($i == 1)
                                                    <div class="col-md-1 plus">
                                                        <button type="button" class="btn btn-primary add_rule" aria-label="Left Align">
                                                            <span class="glyphicon glyphicon-plus chod" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                                                    @else
                                                    <div class="col-md-1 plus">
                                                        <button type="button" class="btn btn-danger del_rule" aria-label="Left Align">
                                                            <span class="glyphicon glyphicon-minus chod" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                                                    @endif
                                                    <br><br>
                                                </div>
                                                <?php $i++; ?>
                                                @endforeach
                                                @endif
                                            </div>
                                            <br>

                                            @if($action == 'Add Event')
                                            <?php
                                            $timing = '0000-00-00 00:00';
                                            $contacts = [['name'=>'', 'number'=>''],['name'=>'', 'number'=>'']];
                                            $prizes = ['', ''];
                                            ?>
                                            @endif

                                            <?php
                                            $time = explode(" ", $timing)[1];
                                            $date = explode(" ", $timing)[0];
                                            ?>


                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="time" class="col-md-2 control-label">Time</label>
                                                    <div class="col-md-4">
                                                        <input type="time" placeholder='HH:MM' name="time" class="form-control" pattern="[0-1][0-9]|2[0-3]:[0-5][0-9]" value="{{$time}}">
                                                    </div>
                                                    <label for="date" class="col-md-2 control-label">Date</label>
                                                    <div class="col-md-4">
                                                        <input type="date" placeholder='YYYY-MM-DD' name="date" class="form-control" pattern="2016-04-0[7-9]" value="{{$date}}">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="contact" class="col-md-2 control-label">Contacts</label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="contact_name1" class="form-control" placeholder="Name" value="{{$contacts[0]->name}}">
                                                    </div>
                                                    <div class="col-md-4 col-md-offset-2">
                                                        <input type="tel" name="contact_number1" class="form-control" placeholder="Number" pattern="[0-9]{10}" value="{{$contacts[0]->number}}">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4 col-md-offset-2">
                                                        <input type="text" name="contact_name2" class="form-control" placeholder="Name" value="{{$contacts[1]->name}}">
                                                    </div>
                                                    <div class="col-md-4 col-md-offset-2">
                                                        <input type="tel" name="contact_number2" class="form-control" placeholder="Number" pattern="[0-9]{10}" value="{{$contacts[1]->number}}">
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="prize_money" class="col-md-2 control-label">Prize Money</label>
                                                    <div class="col-md-4">
                                                        <input type="tel" name="prize_money1" class="form-control" placeholder="Fisrt Prize  (don't add Rs.)" pattern="[0-9]*" value="{{$prizes[0]}}">
                                                    </div>
                                                    <div class="col-md-4 col-md-offset-2">
                                                        <input type="tel" name="prize_money2" class="form-control" placeholder="Second Prize  (don't add Rs.)" pattern="[0-9]*" value="{{$prizes[1]}}">
                                                    </div>
                                                </div>
                                            </div><br>



                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="file" class="col-md-2 control-label">File Upload (Optional)</label>
                                                    <div class="col-md-4 col-md-offset-2">
                                                        <input type="file" name="file" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="row" style="text-align:center; color:#ef2345">
                                                    @if($action == 'Edit Event' && $attachment != "")
                                                    <p>This event has an attachment already!
                                                        <br>
                                                        Uploading another attachment will override the previous one.
                                                        Click <a href="{{ route('download', ['id'=>$attachment, 'event'=>$event_name]) }}">here</a> to download attachment.
                                                    </p>
                                                    @endif
                                                </div>
                                            </div><br>

                                            @endif

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

                                            <button type="submit" class="btn btn-default btn-lg" style="float:right">{{ $action }}</button>
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
        <script type="text/javascript">
        $('.rules').bind('rules_add', function(){
            var group = $(this);
            var input = $('.rule-1', group);
            var minus = $('.plus', input);
            $(document).on('click', '.add_rule', function(){
                var s = $(input).clone().appendTo(group);
                var i = $('.x').length;
                s.find('#rulenumber').html(i);
                s.attr('rule_no', i);
                s.find('.add_rule').removeClass('add_rule btn-primary');
                s.find('.plus button').addClass('del_rule btn-danger');
                s.find('.del_rule').attr('rule', i);
                s.find('.plus button span').removeClass('glyphicon-plus');
                s.find('.plus button span').addClass('glyphicon-minus');
                s.find('input').val('').focus();
            });

            $(document).on('click', '.del_rule', function(){
                var x = $(this).parent().parent();
                x.remove();
                var z = $('.rule');
                for(var i = 0; i < z.length; i++){
                    $(z[i]).find('#rulenumber').html(i+1);
                }
            });
        });
$('.rules').trigger('rules_add');</script>

</body>

</html>
