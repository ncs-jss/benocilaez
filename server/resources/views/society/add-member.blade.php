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
			    <form class="form-horizontal" action="{{ isset($member) ? custom_url('members/'.$member->id) : custom_url('member') }}" method="POST">
			    	{{ csrf_field() }}
			    	@if (isset($member))
			    		<input name="_method" type="hidden" value="PUT">
			    	@endif
			        <div class="card-body">
			            <h4 class="card-title">@if(isset($member))Edit @else Add @endif Member</h4>
			            <div class="form-group row">
			                <label for="name" class="col-sm-3 text-right control-label col-form-label">Member Name <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ isset($member) ? $member->name : old('name') }}" id="name" name="name" placeholder="Member Name" required="">
				                @if ($errors->has('name'))
				                    <p class="text-danger">
				                        {{ $errors->first('name') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="email" class="col-sm-3 text-right control-label col-form-label">Member E-mail <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ isset($member) ? $member->email : old('email') }}" id="email" name="email" placeholder="Member E-mail" required="">
				                @if ($errors->has('email'))
				                    <p class="text-danger">
				                        {{ $errors->first('email') }}
				                    </p>
				                @endif
			                </div>
			            </div>

			            <div class="form-group row">
			                <label for="branch" class="col-sm-3 text-right control-label col-form-label">Branch <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <select class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" id="branch" name="branch" required="">
			                    	@foreach ($branch as $b)
			                    		<option value ="{{ $b->id }}"
			                    		@if (old('branch') == $b->id)
			                    			selected
			                    		@elseif(isset($member))
			                    			@if ($member->branch_id == $b->id)
			                    				selected
			                    			@endif
			                    		@endif
			                    		>{{ $b->branch }}</option>
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
			                <label for="year" class="col-sm-3 text-right control-label col-form-label">Year <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <select class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" id="year" name="year" required="">
			                			@for($i = 1; $i <= 4; $i++)
			                    		<option value ="{{ $i }}"
			                    		@if (old('year') == $i)
			                    			selected
			                    		@elseif(isset($member))
			                    			@if ($member->yr == $i)
			                    				selected
			                    			@endif
			                    		@endif
			                    		>{{ $i }}</option>
			                    	@endfor
			                    </select>
				                @if ($errors->has('year'))
				                    <p class="text-danger">
				                        {{ $errors->first('year') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="category1" class="col-sm-3 text-right control-label col-form-label">Category <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <select class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" id="category1" name="category" required="">
			                    	@foreach ($member_type as $mt)
			                    		<option value ="{{ $mt->id }}"
			                    		@if (old('category') == $mt->id)
			                    			selected
			                    		@elseif(isset($member))
			                    			@if ($member->member_type_id == $mt->id)
			                    				selected
			                    			@endif
			                    		@endif
			                    		>{{ $mt->name }}</option>
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
			                <label for="contact" class="col-sm-3 text-right control-label col-form-label"> Contact No. <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="number" class="form-control {{ $errors->has('contact_number') ? ' is-invalid' : '' }}" value="{{ isset($member) ? $member->contact : old('contact_number') }}" id="contact" name="contact" placeholder="Contact Person Number" required="">
				                @if ($errors->has('contact_number'))
				                    <p class="text-danger">
				                        {{ $errors->first('contact_number') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			            <div class="form-group row">
			                <label for="zeal" class="col-sm-3 text-right control-label col-form-label">Zeal Id <font color="red">*</font></label>
			                <div class="col-sm-9">
			                    <input type="text" class="form-control {{ $errors->has('zeal') ? ' is-invalid' : '' }}" value="{{ isset($member) ? $member->zeal_id : old('zeal') }}" id="zeal" name="zeal" placeholder="Zeal Id" required="">
				                @if ($errors->has('zeal'))
				                    <p class="text-danger">
				                        {{ $errors->first('zeal') }}
				                    </p>
				                @endif
			                </div>
			            </div>
			        </div>
			        <div class="border-top">
			            <div class="card-body">
			                <button type="submit" class="btn btn-primary">@if(isset($member))Edit member @else Add member @endif</button>
			            </div>
			        </div>
			    </form>
			</div>
		</div>
	</div>
</div>
@stop
