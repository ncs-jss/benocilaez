@extends('layouts.default')

@section('content')
<div class="container-fluid">
    <div class="row">
	    @if($errors->any())
	        <div class="alert alert-danger">
	        <strong>There is/are errors in {{ implode(', ', $errors->keys()) }} fields</strong>
	        </div>
	    @endif
        @include('includes.msg')
    </div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
			    <form class="form-horizontal" action="{{ isset($winner) ? custom_url('winners/'.$winner->id) : custom_url('winner') }}" method="POST">
			    	{{ csrf_field() }}
			    	@if (isset($winner))
			    		<input name="_method" type="hidden" value="PUT">
			    	@endif
			        <div class="card-body">
			            <h4 class="card-title">@if(isset($winner))Edit @else Add @endif  Event Winner</h4>
			            <div class="form-group row">
			                <label for="name" class="col-sm-3 text-right control-label col-form-label">Winner Name <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ isset($winner) ? $winner->name : old('name') }}" id="name" name="name" placeholder="Winner Name" required="">
				                @if ($errors->has('name'))
				                    <p class="text-danger">
				                        {{ $errors->first('name') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="winner_contact" class="col-sm-3 text-right control-label col-form-label">Winner Contact No. <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="number" class="form-control {{ $errors->has('winner_contact') ? ' is-invalid' : '' }}" value="{{ isset($winner) ? $winner->contact_no : old('winner_contact') }}" id="winner_contact" name="winner_contact" placeholder="Winner Contact No." required="" pattern="[0-9]{10}">
				                @if ($errors->has('winner_contact'))
				                    <p class="text-danger">
				                        {{ $errors->first('winner_contact') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="zeal_id" class="col-sm-3 text-right control-label col-form-label">Zeal Id <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control {{ $errors->has('zeal_id') ? ' is-invalid' : '' }}" value="{{ isset($winner) ? $winner->zeal_id : old('zeal_id') }}" id="zeal_id" name="zeal_id" placeholder="Zeal Id" required="">
				                @if ($errors->has('zeal_id'))
				                    <p class="text-danger">
				                        {{ $errors->first('zeal_id') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="event" class="col-sm-3 text-right control-label col-form-label">Event <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <select class="form-control {{ $errors->has('event') ? ' is-invalid' : '' }}" id="event" name="event" required="">
			                    	@foreach ($events as $event)
			                    		<option value ="{{ $event->id }}"
			                    		@if (old('event') == $event->id)
			                    			selected
			                    		@elseif(isset($winner))
			                    			@if ($winner->event_id == $event->id)
			                    				selected
			                    			@endif
			                    		@endif
			                    		>{{ $event->name }}</option>
			                    	@endforeach
			                    </select>
				                @if ($errors->has('event'))
				                    <p class="text-danger">
				                        {{ $errors->first('event') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="rank" class="col-sm-3 text-right control-label col-form-label">Rank <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <select class="form-control {{ $errors->has('rank') ? ' is-invalid' : '' }}" id="rank" name="rank" required="">
			                    	<option value ="1"
			                    	@if (old('rank') == 1)
			                    		selected
			                    	@elseif(isset($winner))
			                    		@if ($winner->rank == 1)
			                    			selected
			                    		@endif
			                    	@endif
			                    	>1</option>
			                    	<option value ="2"
			                    	@if (old('rank') == 2)
			                    		selected
			                    	@elseif(isset($winner))
			                    		@if ($winner->rank == 2)
			                    			selected
			                    		@endif
			                    	@endif
			                    	>2</option>
			                    </select>
				                @if ($errors->has('rank'))
				                    <p class="text-danger">
				                        {{ $errors->first('rank') }}
				                    </p>
				                @endif
			                </div>
			            </div>  
			        </div>
			        <div class="border-top">
			            <div class="card-body">
			                <button type="submit" class="btn btn-primary">@if(isset($ctc))Edit winner @else Add winner @endif</button>
			            </div>
			        </div>
			    </form>
			</div>
		</div>
	</div>
</div>
@stop
