<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="{{asset('public/template/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('public/template/bower_components/font-awesome/css/font-awesome.min.css')}}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="{{asset('public/template/bower_components/Ionicons/css/ionicons.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('public/template/dist/css/AdminLTE.min.css')}}">
		<!-- iCheck -->
		<link rel="stylesheet" href="{{asset('public/template/plugins/iCheck/square/blue.css')}}">
		
		
		<!-- Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>User</a>
			</div>
			<div class="login-box-body">
				<p class="login-box-msg">Sign in to start your session</p>
				
				<form method="POST" action="{{ route('login') }}">
                   @csrf
					<div class="form-group has-feedback">
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" >
						@if ($errors->has('email'))
						<span class="help-block" style="color:red;">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
						@if ($errors->has('password'))
						<span class="help-block" style="color:red;">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		<!-- jQuery 3 -->
		<script src="{{asset('public/template/bower_components/jquery/dist/jquery.min.js')}}"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="{{asset('public/template/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		<!-- iCheck -->
		<script src="{{asset('public/template/plugins/iCheck/icheck.min.js')}}"></script>
		<script>
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%' // optional
				});
			});
		</script>
	</body>
</html>
