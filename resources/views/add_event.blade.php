<!DOCTYPE html>
<html>
<head>
    <title>{{ $action }}</title>
    <script src="//cdn.ckeditor.com/4.5.6/basic/ckeditor.js"></script>
    <!-- // <script src="{{ URL::asset('ass/ckeditor.js') }}"></script> -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="css/jquery.fileupload.css">
    <link rel="stylesheet" href="css/jquery.fileupload-ui.css">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>

    <style>
    #f1_upload_process{
        z-index:100;
        position:absolute;
        visibility:hidden;
        text-align:center;
        width:400px;
        margin:0px;
        padding:0px;
        background-color:#fff;
        border:1px solid #ccc;
    }

    .upload{
        text-align:center;
        width:390px;
        margin:0px;
        padding:5px;
        background-color:#fff;
        border:1px solid #ccc;

    }



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
<body style="padding-top:0px;border-top:0px;margin-top:0px">
    @include('header')

    <script type="text/javascript">
    $(document).ready(function(){
        $('.err').css('display','none');
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
        timing: $('input[name=date]').val()+" "
        +$('input[name=time]').val(),
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

    $.post('add_event', data, function(v){
        clearInterval(adding);
        //console.log(v._token);
        if(v.status == 1){
            $('.err').html('Event Added Successfully');
            $('.err').css("display","block");
            CKEDITOR.instances['editor1']
            .setData("Your Event's Description Here...");
            setTimeout(function(){
                $('.err').css("display","none");
            },3000);
            $('input').val("");
        }else{
            $('.err').html('Event could not be added.');
            $('.err').css("display","block");
        }
        $('input[name="_token"]').attr('value', v._token);
    }).fail(function(){
        clearInterval(adding);
        $('.err').html('Event could not be added.');
        $('.err').css("display","block");
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
            $('.err').css("display","block");
        }else{
            $('.err').html('Event could not be edited.');
            $('.err').css("display","block");
        }
    });
    @endif
});

$('.rules').bind('rules_add', function(){
    console.log('abhay');
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
                        CKEDITOR.replace( 'editor1' ,  {
                            extraAllowedContent: 'strong[onclick]'
                        } );
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
                </div>

                <br>
                <div class="form-group">
                    <label for="time" class="col-md-4 control-label">Time</label>
                    <div class="col-md-2">
                        <input type="time" placeholder='HH:MM' name="time" class="form-control">
                    </div>
                    <label for="date" class="col-md-1 control-label">Date</label>
                    <div class="col-md-2">
                        <input type="date" placeholder='YYYY-MM-DD' name="date" class="form-control">
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
            </div>
            <div class="row">
                <div class="col-md-offset-4"></div>
                <div style="text-align:center">
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                        </div>
                        <!-- The extended global progress state -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
            </form>
        </div>
    </div>
    <div class="row" style="color:red;text-align:center">
        <div class="col-md-offset-4"></div>
        @if($errors->has())
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
        @endif
    </div>
    <div class="col-md-7"></div>

    <div class="form-group">
        <div class="alert alert-success col-md-6 col-md-offset-3 err" role="alert" id="success">{{ $err }}</div>
        <button type="button" id="go" class="btn btn-primary col-md-2 col-md-offset-5">{{ $action }}</button>
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
