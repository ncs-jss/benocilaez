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
                            Add Winners
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

        <div class="container">
		<div style="text-align:center">
			<form class="form-horizontal" role="form" action="" method="POST">
				<div class="form-group" >
					<label for="event_name" class="control-label" style="display:block; text-align:center;">Event Name</label>
					<select  class="form-control" id="event_name" style="margin-left:1.5%; width:inherit; display:inline">
						@foreach ($events as $data)
						<option value="{{ $data['event_id']}}">{{ $data['event_name'] }}</option>
						@endforeach
					</select>
				</div>
				<br>

				<div class="form-group winner" id='winner' style="text-align:center">
					<p><b>Winner:</b></p>
					<div class="col-md-10 col-md-offset-2 rule0">
						<div class="col-md-9">
							<div class="input-group rule-1">
								<span class="input-group-addon" id="winnerno0">1</span>
								<input type="text" class="form-control event_rule" placeholder="Winner" aria-describedby="basic-addon1">
							</div>
						</div>                      
						<div class="col-md-1 plus">
							<button type="button" class="btn btn-primary add_rule0" aria-label="Left Align">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
						</div>
						<br><br>
					</div>
				</div>

				<br>
				<br>

				<div class="form-group winner" id='runnerup1'style="text-align:center">
					<p><b>1st Runner Up:</b></p>
					<div class="col-md-10 col-md-offset-2 rule1">
						<div class="col-md-9">
							<div class="input-group rule-1">
								<span class="input-group-addon" id="winnerno1">1</span>
								<input type="text" class="form-control event_rule" placeholder="1st Runner Up" aria-describedby="basic-addon1">
							</div>
						</div>                      
						<div class="col-md-1 plus">
							<button type="button" class="btn btn-primary add_rule1" aria-label="Left Align">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
						</div>
						<br><br>
					</div>
				</div>

				<br>
				<br>

				<div class="form-group winner" id='runnerup2'style="text-align:center">
					<p><b>2nd Runner Up:</b></p>
					<div class="col-md-10 col-md-offset-2 rule2">
						<div class="col-md-9">
							<div class="input-group rule-1">
								<span class="input-group-addon" id="winnerno2">1</span>
								<input type="text" class="form-control event_rule" placeholder="2nd Runner Up" aria-describedby="basic-addon1">
							</div>
						</div>                      
						<div class="col-md-1 plus">
							<button type="button" class="btn btn-primary add_rule2" aria-label="Left Align">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</button>
						</div>
						<br><br>
					</div>
				</div>

				<br>
				<br>
				<div class="help">
					<p style="font-size:1.2em; color:#F44336">The names of winners once added shall not be changed.</p>
				</div>
				<div class="alert alert-danger col-md-6 col-md-offset-3" role="alert">Empty field.</div>
				<div class="col-md-7"></div>
				<div class="col-md-2">
					<button type="button" class="btn btn-default" id="go">{{ $action }}</button>
				</div>
			</div>
			<div class="col-md-5">
        			<input type="hidden" id="token" value="{{ csrf_token() }}">
    		</div>
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div><br>
	<br><br><br><br><br>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#go').click(function(){
				var c = [], d = [], e = [];
				$('#winner .rule0 input').each(function(){c.push($(this).val())});
				$('#runnerup1 .rule1 input').each(function(){d.push($(this).val())});
				$('#runnerup2 .rule2 input').each(function(){e.push($(this).val())});
				console.log(c);
			
			console.log($(this));
			var i = 0;

			var data = {
				event_id : $('#event_name').val(),
				winnner : c,
				runnnerup1 : d,
				runnerup2 : e,
				_token: $('#token').val(),
			}
			console.log(data);
			
			var check = true;
			var repeat = function(x){
				for(var i=0; i<x.length; i++){
					if(c[i] === ''){
						return false;
					}
				}
				return true;
			}
			check  = repeat(d) && repeat(c) && repeat(e);
			console.log(check);
			if(check === true){
				var button = $(this);
				var adding = setInterval(function(){
					button.html('Adding winner'+'.'.repeat(i % 4));
					i = (i+1) % 4;
				},500);
				$.post('add_winners', data, function(response){
				clearInterval(adding);
				if(response == 1){
					document.write(response);
				}else{
					document.write("Error");
				};
			}); 
			}else if(check===false){
				$(".alert").css("display","block");
			}	
		});		


			$('.winner').each(function(index){
				$(this).bind('rules_add', function(){
					var group = $(this);
				var input = $('.rule'+index, group);
				var minus = $('.plus', input);

				$(document).on('click', '.add_rule'+index, function(){
					var s = $(input).clone().appendTo(group);
					var i = $('.rule'+index).length;
					s.find('#winnerno'+index).html(i);
					s.attr('rule_no', i);
					s.find('.add_rule'+index).removeClass('add_rule' + index +' btn-primary');
					s.find('.plus button').addClass('del_rule' + index +' btn-danger');
					s.find('.del_rule'+index).attr('rule', i);
					s.find('.plus button span').removeClass('glyphicon-plus');
					s.find('.plus button span').addClass('glyphicon-minus');
					s.find('input').val('').focus();
				});

				$(document).on('click', '.del_rule'+index, function(){
					var x = $(this).parent().parent();
					x.remove();
					var z = $('.rule'+index);
					for(var i = 0; i < z.length; i++){
						$(z[i]).find('#winnerno'+index).html(i+1);
					}
				});
			});
			})
			$('.winner').trigger('rules_add');
		});
	</script>

</body>
</html>