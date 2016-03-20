<!DOCTYPE html>
<html>
@include('header')
<body>
<style>
.alert
{
    display: none;
}

</style>
<script>
$(document).ready(function(){
    $('#go').click(function(){
        var data={
            society_name: $('input[name="society_name"]').val(),
            email: $('input[name="username"]').val(),
            password: $('input[name="password"]').val(),
            _token: $('input[name="_token"]').val(),
        }

        function clear_inputs(){
            $('input').val("");
        }

        $.post("register_society", data, function(response){
            if(response.status == 'a'){
                clear_inputs();
                $('#success').css("display","block");
                setTimeout(function(){
                    $('#success').css("display","none");
                    console.log($(this));;
                },2000);
            }else if(response.status == 'b'){
                $('#validation').css("display","block");
                setTimeout(function(){
                    $('#validation').css("display","none");
                    console.log($(this));
                },2000);
            }else{
                $('#failure').css("display","block");
                setTimeout(function(){
                    $('#failure').css("display","none");
                    console.log($(this));
                },2000);
            }
            $('input[name="_token"]').attr("value", response._token);
        })

    })
})
</script>
<div class="container-fluid">
    <div style="text-align:">
        <form class="form-horizontal" role="form" action="" method="POST">
            <div class="form-group">
                <label for="societyname" class="col-xs-12  col-md-4  control-label">Society Name</label>
                <div class="col-xs-12  col-md-5">
                    <input type="text" name="society_name" class="form-control" placeholder="Society Name">
                </div>
            </div><br>
            <div class="form-group">
                <label for="username" class="col-xs-12  col-md-4  control-label">User Name</label>
                <div class="col-xs-12  col-md-5">
                    <input type="text" name="username" class="form-control" placeholder="User Name">
                </div>
            </div><br>
            <div class="form-group">
                <label for="password" class="col-xs-12  col-md-4  control-label">Password</label>
                <div class="col-xs-12  col-md-5">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div><br>
            <div class="form-group">
                <div class="alert alert-success col-xs-6 col-xs-offset-3" role="alert" id="success">Hurray! Society added.</div>
                <div class="alert alert-danger col-xs-6 col-xs-offset-3" role="alert" id="failure">Oops! Looks like your society could not be added.</div>
                <div class="alert alert-danger col-xs-6 col-xs-offset-3" role="alert" id="validation">Validation Error.</div>
                <button type="button" class="btn btn-primary col-xs-2 col-xs-offset-5" id="go">Add Society</button>
            </div>
            <div class="col-xs-12  col-md-5">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </div>
    </form><br><br><br><br><br><br>
</div>
</div>
</body>
</html>
