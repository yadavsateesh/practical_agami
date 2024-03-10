@extends('layouts.main')
@section('title') {{ 'User List | '.env('APP_NAME') }}
@endsection
@push('after-css')
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			User List
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">User List</li>
		</ol>
		@if (Session::get('success'))

		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Success:</h4>{{ Session::get('success') }}
		 </div>
		@endif
		@if (Session::get('danger'))

		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i> Error!</h4>{{ Session::get('danger') }}
		</div>
		@endif
	</section>
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">List</h3>
						
					</div>
					@if(!empty(auth()->user()->permission_id))
					@if(in_array(2,explode(',',auth()->user()->permission_id)))
		
					<a type="button" href="{{ route('user.create') }}" class="btn btn-primary">Create User</a>
					@endif
					@endif
					<!-- /.box-header -->
					<div class="box-body">
						<table id="user_lists" class="table table-bordered table-striped">
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
    <!-- /.content -->
</div>
@endsection

@push('after-js')

<script>
	$('#user_lists').DataTable({
		ajax: {
			url: "{{ route('user-list') }}",
			type: 'POST',
		},
		serverSide: false,
		bAutoWidth: false,
		order: [],
		columns: [
		{ data: 'name', title: "Name" },
		{ data: 'email', title: "Email" },
		{ data: 'phone_number', title: "Phone Number" },
		{ data: 'city', title: "City" },
		{ data: 'gender', title: "Gender" },
		{ data: 'hobbies', title: "Hobbies" },
		{ data: 'created_at', title: "Created At" },
		{ data: 'action', title: "Action" },
		],
		
	});
	
	function confirm_click() {
		return confirm('Are you sure you want to delete');
	}
	
</script>
@endpush