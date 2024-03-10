@extends('layouts.main')
@section('title') {{ 'Add User| '.env('APP_NAME') }} 
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
			<li class="active">User Create</li>
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
			<form role="form" action="{{ route('user.store') }}" method="post">
				@csrf
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="userName">User Name</label>
							<input type="text" class="form-control" name="name" id="userName" placeholder="Enter User name" value="{{ old('name') }}">
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
							<input type="email" class="form-control" name="email" id="userEmail" placeholder="Enter User Email" value="{{ old('email') }}">
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
							<label for="userPassword">Password</label>
							<input type="password" class="form-control" name="password" id="userPassword" placeholder="Enter Password" value="{{ old('password') }}">
							@if ($errors->has('password'))
						<span class="validation" style="color:red;">
							{{ $errors->first('password') }}
						</span>
						@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="userNumber">Phone Number</label>
							<input type="text" class="form-control" name="phone_number" id="userNumber" placeholder="Enter Phone Number" value="{{ old('phone_number') }}">
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
							  <option value="surat">Surat</option>
							  <option value="navsari">Navsari</option>
							  <option value="vapi">Vapi</option>
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
							<input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male">
							<label class="form-check-label" for="flexRadioDefault1">
							Male
							</label>
							<input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" checked value="female">
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
						  <input class="form-check-input" type="checkbox" value="singing" id="defaultCheck1" name="hobbies[]">
						  <label class="form-check-label" for="defaultCheck1">
							Singing
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="dancing" id="defaultCheck2" name="hobbies[]">
						  <label class="form-check-label" for="defaultCheck2">
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
						  <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="defaultCheck{{ $permission->id }}" name="permission[]">
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