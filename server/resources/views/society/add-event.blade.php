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
			    <form class="form-horizontal" action="{{ isset($event) ? custom_url('events/'.$event->id) : custom_url('event') }}" method="POST">
			    	{{ csrf_field() }}
			    	@if (isset($event))
			    		<input name="_method" type="hidden" value="PUT">
			    	@endif
			        <div class="card-body">
			            <h4 class="card-title">Add Event</h4>
			            <div class="form-group row">
			                <label for="title" class="col-sm-3 text-right control-label col-form-label">Event Title <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ isset($event) ? $event->name : old('title') }}" id="title" name="title" placeholder="Event Title" required="">
				                @if ($errors->has('title'))
				                    <p class="text-danger">
				                        {{ $errors->first('title') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="description" class="col-sm-3 text-right control-label col-form-label">Event Description <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" placeholder="Event Description" required="">{{ isset($event) ? $event->description : old('description') }}</textarea>
				                @if ($errors->has('description'))
				                    <p class="text-danger">
				                        {{ $errors->first('description') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="winner1_amount" class="col-sm-3 text-right control-label col-form-label">Winner 1 Amount <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="number" class="form-control {{ $errors->has('winner1_amount') ? ' is-invalid' : '' }}" value="{{ isset($event) ? $event->winner1 : old('winner1_amount') }}" id="winner1_amount" name="winner1_amount" placeholder="Winner 1 Amount" required="">
				                @if ($errors->has('winner1_amount'))
				                    <p class="text-danger">
				                        {{ $errors->first('winner1_amount') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="winner2_amount" class="col-sm-3 text-right control-label col-form-label">Winner 2 Amount</label>
			                <div class="col-sm-9">
			                    <input type="number" class="form-control {{ $errors->has('winner2_amount') ? ' is-invalid' : '' }}" value="{{ isset($event) ? $event->winner2 : old('winner2_amount') }}" id="winner2_amount" name="winner2_amount" placeholder="Winner 2 Amount">
				                @if ($errors->has('winner2_amount'))
				                    <p class="text-danger">
				                        {{ $errors->first('winner2_amount') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="contact_name" class="col-sm-3 text-right control-label col-form-label">Contact Person Name <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control {{ $errors->has('contact_name') ? ' is-invalid' : '' }}" value="{{ isset($event) ? $event->contact_name : old('contact_name') }}" id="contact_name" name="contact_name" placeholder="Contact Person Name" required="">
				                @if ($errors->has('contact_name'))
				                    <p class="text-danger">
				                        {{ $errors->first('contact_name') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="contact_number" class="col-sm-3 text-right control-label col-form-label">Contact Person Number <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="number" class="form-control {{ $errors->has('contact_number') ? ' is-invalid' : '' }}" value="{{ isset($event) ? $event->contact_no : old('contact_number') }}" id="contact_number" name="contact_number" placeholder="Contact Person Number" required="">
				                @if ($errors->has('contact_number'))
				                    <p class="text-danger">
				                        {{ $errors->first('contact_number') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="contact_number" class="col-sm-3 text-right control-label col-form-label">Category <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <select class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" id="category" name="category" required="">
			                    	@foreach ($category as $c)
			                    		<option value ="{{ $c->id }}"
			                    		@if (old('category') == $c->id)
			                    			selected
			                    		@elseif(isset($event))
			                    			@if ($event->category_id == $c->id)
			                    				selected
			                    			@endif
			                    		@endif
			                    		>{{ $c->name }}</option>
			                    	@endforeach
			                    </select>
				                @if ($errors->has('category'))
				                    <p class="text-danger">
				                        {{ $errors->first('category') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="is_active" class="col-sm-3 text-right control-label col-form-label">Is Active ?</label>
			                <div class="col-sm-9">
			                    <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" 
		                    		@if (old('is_active'))
		                    			checked
		                    		@elseif(isset($event))
		                    			@if ($event->is_active)
		                    				checked
		                    			@endif
		                    		@endif >
                                    <label class="custom-control-label" for="is_active">Yes</label>
                                </div>
				                @if ($errors->has('is_active'))
				                    <p class="text-danger">
				                        {{ $errors->first('is_active') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			        </div>
			        <div class="border-top">
			            <div class="card-body">
			                <button type="submit" class="btn btn-primary">Add Event</button>
			            </div>
			        </div>
			    </form>
			</div>
		</div>
	</div>
</div>
@stop
