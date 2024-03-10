@extends('layouts.main')
@section('title') {{ 'User Edit| '.env('APP_NAME') }} 
@endsection
@push('after-css')
@endpush
@section('content')
<div class="content-wrapper">
    <section class="content-header">
		<h1>
			Users
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">User Edit</li>
		</ol>
	</section>
    <section class="content">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">User</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<form role="form" action="{{ route('user.update',$user->id) }}" method="post">
				@csrf
				@method('PUT')
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="userName">User Name</label>
							<input type="text" class="form-control" name="name" id="userName" placeholder="Enter User name" value="{{ $user->name}}">
							@if ($errors->has('name'))
							<span class="validation" style="color:red;">
								{{ $errors->first('name') }}
							</span>
							@endif
						</div>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="userEmail">Email</label>
							<input type="email" class="form-control" name="email" id="userEmail" placeholder="Enter User Email" value="{{$user->email}}">
							@if ($errors->has('email'))
						<span class="validation" style="color:red;">
							{{ $errors->first('email') }}
						</span>
						@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="userNumber">Phone Number</label>
							<input type="text" class="form-control" name="phone_number" id="userNumber" placeholder="Enter Phone Number" value="{{ $user->phone_number }}">
							@if ($errors->has('phone_number'))
						<span class="validation" style="color:red;">
							{{ $errors->first('phone_number') }}
						</span>
						@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
							<label for="userNumber">City</label>
							<div class="form-group">
								<select class="form-select" aria-label="Default select example" name="city">
								  <option value=""> --Select City-- </option>
								  <option value="surat" {{ $user->city == 'surat' ? 'selected' : '' }}>Surat</option>
								  <option value="navsari"{{ $user->city == 'navsari' ? 'selected' : '' }}>Navsari</option>
								  <option value="vapi" {{ $user->city == 'vapi' ? 'selected' : '' }}>Vapi</option>
								</select>
							</div>
						@if ($errors->has('city'))
						<span class="validation" style="color:red;">
							{{ $errors->first('city') }}
						</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					<label for="Gender">Gender:</label>
						<div class="form-group">
							<input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
							<label class="form-check-label" for="flexRadioDefault1">
							Male
							</label>
							<input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}>
						<label class="form-check-label" for="flexRadioDefault2">
						Female
						</label>
						</div>
						@if ($errors->has('gender'))
						<span class="validation" style="color:red;">
							{{ $errors->first('gender') }}
						</span>
						@endif
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<label for="Hobbies">Hobbies:</label>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="singing" id="singing1" name="hobbies[]" {{ isset($user->hobbies) && in_array('singing',explode(',',$user->hobbies)) ? 'checked' : '' }}>
						  <label class="form-check-label" for="singing1">
							Singing
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="dancing" id="dancing2" name="hobbies[]" {{ isset($user->hobbies) && in_array('dancing',explode(',',$user->hobbies)) ? 'checked' : '' }}>
						  <label class="form-check-label" for="dancing2">
							Dancing
						  </label>
						</div>
						@if ($errors->has('hobbies'))
						<span class="validation" style="color:red;">
							{{ $errors->first('hobbies') }}
						</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<label for="Permmsions">Permmsions:</label>
						@foreach($permissions as $permission)
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="defaultCheck{{ $permission->id }}" name="permission[]" {{ isset($user->hobbies) && in_array($permission->id,explode(',',$user->permission_id)) ? 'checked' : '' }}>
						  <label class="form-check-label" for="defaultCheck{{ $permission->id }}">
						  {{ $permission->permission }}
						  </label>
						</div>
						@endforeach
						@if ($errors->has('permission'))
						<span class="validation" style="color:red;">
							{{ $errors->first('permission') }}
						</span>
						@endif
					</div>
				</div>
				
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right">Save</button>
			</div>
			</form>
		</div>
	</section>
</div>
@endsection

@push('after-js')