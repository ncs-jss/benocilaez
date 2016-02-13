<!DOCTYPE html>
<html>
<head>
    <title>{{ $action }}</title>
    <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
    <!-- // <script src="{{ URL::asset('ass/ckeditor.js') }}"></script> -->
    <style>
    .desc{
        width:150%;
        height:200px; 
    }
    #my-file-selector{
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
    }
    
    #my-file-selector + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: black;
    display: inline-block;
    }

    #my-file-selector:focus + label,
    .my-file-selector + label:hover 
    {
    background-color: blue;
    }
    </style>
</head>
<body>
    @include('header')

    <script type="javascript">
    
    ( document, window, 0 ));
    $(document).ready(function(){
        $('#go').click(function(){
            var rules = [];
            $('.event_rule').each(function(){
                rules.push($(this).val());
            });
            var event_des ={short_des: $('input[name=short_description]').val(),
            long_des: CKEDITOR.instances['editor1'].getData(),
            rules: rules,
            }
            console.log($('input[name=event_name]').val()=='');
            if($('input[name=event_name]').val() == ''){
                console.log('s');
                $('.req').addClass('has-error');
                $('input[name=event_name]').focus();
                return;
            }else{
                $('.req').removeClass('has-error');
            }
            $('form-group[class=req]').addClass('inputError1');
            var data = {event_name: $('input[name=event_name]').val(),
                    event_description: event_des,
                    contact: [{name: $('input[name=contact_name1]').val(), 
                                number: $('input[name=contact_number1]').val(),},
                              {name: $('input[name=contact_name2]').val(), 
                                number: $('input[name=contact_number2]').val(),}],
                    prize_money:[$('input[name=prize_money1]').val(), 
                                    $('input[name=prize_money2]').val(),],
                    timing: '',
                    _token: $('input[name=_token]').val(),
                    attachment :$('input[name=attachment]').val()
            }
            var button = $(this);
            var i = 0;
            console.log(button);


            @if( $edit == 0)
            var adding = setInterval(function(){
                button.html('Adding Event'+'.'.repeat(i % 4));
                i = (i + 1) % 4;
            }, 500);

            $.post('add_event', data, function(response){
                clearInterval(adding);
                if(response == 1){
                    window.location.href = window.location.href;
                }else{
                    $('.err').html('Event could not be added.');
                }
            });
            @else
            var adding = setInterval(function(){
                button.html('Editing Event'+'.'.repeat(i % 4));
                i = (i + 1) % 4;
            }, 500);

            $.post('{!! $id !!}', data, function(response){
                clearInterval(adding);
                if(response == 1){
                    window.location.href = "../view_event";
                }else if(response == 0){
                    $('.err').html('An approved event can not be edited.'+
                        ' Request for editing from view event page...');
                }else{
                    $('.err').html('Event could not be edited.');
                }
            });
            @endif

            

        });




        var clear_inputs = function(){
            $('input').each(function(){
                $(this).val('');
            });
        }

        $('.rules').bind('rules_add', function(){
            var group = $(this);
            var input = $('.rule', group);
            var minus = $('.plus', input);
            $(document).on('click', '.add_rule', function(){
                var s = $(input).clone().appendTo(group);
                var i = $('.rule').length;
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
        $('.rules').trigger('rules_add');

        @if($edit == 1)

        var populate_inputs = function(){
            var x = {!! html_entity_decode($event_des) !!};
            var json = JSON.parse(x.toString());
            $('input[name=short_description]').val(json.short_des);
            CKEDITOR.instances.editor1.setData(json.long_des);
            var rules = json.rules;
            var i = 1;
            $(".rule-1 input").val( rules[0]);
            console.log(rules);
            for(i = 1; i< rules.length; i++){
                $('.add_rule').click();
                $('div[rule_no='+(i+1)+'] input').val(rules[i]);
            }

            var contact = {!! $contacts !!}

            $('input[name=contact_name1]').val(contact[0].name);
            $('input[name=contact_number1]').val(contact[0].number);
            $('input[name=contact_name2]').val(contact[1].name);
            $('input[name=contact_number2]').val(contact[1].number);

            var prizes = {!! $prizes !!}

            $('input[name=prize_money1]').val(prizes[0]);
            $('input[name=prize_money2]').val(prizes[1]);
        }


        populate_inputs();
        @endif
    });
</script>

<div class="container">

    <div style="text-align:center">
        <form class="form-horizontal" role="form" action="add_event" method="POST" enctype="multipart/form-data">
             <div class="signup-form" id="error">
                @if($errors->has())
                <p>
                  {{$errors->first('event_name',':message')}} </p>
                <p>  {{$errors->first('short_description',':message')}} </p>
                <p>  {{$errors->first('long_des',':message')}} </p>
                <p>  {{$errors->first('editor1',':message')}} </p>
                <p>  {{$errors->first('attachment',':message')}} </p>
                @endif
               </div>
            <div class='err'> {{ $err }}</div>
            <div class="form-group req">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if($action == 'Add Event')
                    <input type="text" name="event_name" class="form-control" placeholder="Event Name *(required)" >
                    @else
                    <h4><strong>{{ $event_name }}</strong></h4>
                        @endif
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <input type="text" name="short_description" class="form-control" placeholder="A Short Description of Your Event..."></textarea>
                    </div>
                </div><br>
                <div class="form-group">
                    <p><b>Event description:</b></p>
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <textarea class="desc" id="editor1" name="editor1">Your Event's Description Here...</textarea>
                        <script type="text/javascript">
                        CKEDITOR.replace( 'editor1' );
                        </script>
                    </div> 
                </div><br>
                <div class="form-group rules" style="text-align:center">
                    <p><b>Rules:</b></p>
                    <div class="col-md-10 col-md-offset-2 rule">
                        <div class="col-md-9">
                            <div class="input-group rule-1">
                                <span class="input-group-addon" id="rulenumber">1</span>
                                <input type="text" class="form-control event_rule" placeholder="Rules" aria-describedby="basic-addon1">
                            </div>
                        </div>                      
                        <div class="col-md-1 plus">
                            <button type="button" class="btn btn-primary add_rule" aria-label="Left Align">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </button>
                        </div>
                        <br><br>
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="time" class="col-md-4 control-label">Time</label>
                    <div class="col-md-2">
                        <input type="time" name="time" class="form-control">
                    </div>
                    <label for="date" class="col-md-1 control-label">Date</label>
                    <div class="col-md-2">
                        <input type="date" name="date" class="form-control">
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="contact" class="col-md-4 control-label">Contacts</label>
                    <div class="col-md-2">
                        <input type="text" name="contact_name1" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <input type="text" name="contact_number1" class="form-control" placeholder="Number">
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <input type="text" name="contact_name2" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <input type="text" name="contact_number2" class="form-control" placeholder="Number">
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="prize_money" class="col-md-4 control-label">Prize Money</label>
                    <div class="col-md-2">
                        <input type="text" name="prize_money1" class="form-control" placeholder="Fisrt Prize">
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <input type="text" name="prize_money2" class="form-control" placeholder="Second Prize">
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-3">
                            <span id="filename" >filename</span>
                            <label class="btn btn-primary">
                                <input id="my-file-selector" type="file" name="attachment" data-multiple-caption="{count} files selected" multiple />
                                Choose file...
                            </label>
                        </div>
                        <div class="col-md-1" style="">
                            <label for="attachment" style="font-size:1.2em">Attachment</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-3">
                    <div class="progress">
                    <div class="progress-bar progress-bar-success" id="progressbar" style="width:40%">
                        <span class="sr-only"></span>
                    </div>
                </div>
                </div>
                </div>
                </div>
                @if($errors->has())
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
                @endif
                <div class="col-md-7"></div>
                <div class="col-md-2">
                    <button type="button" id="go" class="btn btn-primary btn-block">{{ $action }}</button>
                </div>
            </div>
            <div class="col-md-5">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </form>
        <br><br><br><br><br><br>
    </div>
</body>
</html>