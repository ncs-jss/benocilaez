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
			    <form class="form-horizontal" action="{{  custom_url('file')  }}" method="POST" enctype="multipart/form-data">
			    	{{ csrf_field() }}
			        <div class="card-body">
			            <h4 class="card-title">Add File</h4>
			            <div class="form-group row">
			                <label for="title" class="col-sm-3 text-right control-label col-form-label">Upload PDF <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="file" class="form-control {{ $errors->has('file') ? ' is-invalid' : '' }}"  id="file" name="file" required="">
				                @if ($errors->has('file'))
				                    <p class="text-danger">
				                        {{ $errors->first('file') }}
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
			        </div>
			        <div class="border-top">
			            <div class="card-body">
			                <button type="submit" class="btn btn-primary">Add File</button>
			            </div>
			        </div>
			    </form>
			</div>
		</div>
	</div>
</div>
@stop
