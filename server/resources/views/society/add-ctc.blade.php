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
			    <form class="form-horizontal" action="{{ isset($ctc) ? custom_url('ctcs/'.$ctc->id) : custom_url('ctc') }}" method="POST">
			    	{{ csrf_field() }}
			    	@if (isset($ctc))
			    		<input name="_method" type="hidden" value="PUT">
			    	@endif
			        <div class="card-body">
			            <h4 class="card-title">Add CTC</h4>
			            <div class="form-group row">
			                <label for="name" class="col-sm-3 text-right control-label col-form-label">CTC Name <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ isset($ctc) ? $ctc->name : old('name') }}" id="name" name="name" placeholder="CTC Name" required="">
				                @if ($errors->has('title'))
				                    <p class="text-danger">
				                        {{ $errors->first('name') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			        </div>
			        <div class="border-top">
			            <div class="card-body">
			                <button type="submit" class="btn btn-primary">@if(isset($ctc))Edit CTC @else Add CTC @endif</button>
			            </div>
			        </div>
			    </form>
			</div>
		</div>
	</div>
</div>
@stop
