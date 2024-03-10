 @extends('layouts.main')

@section('title') {{ 'Practical | '.env('APP_NAME') }} @endsection

@push('after-css')
@endpush
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Practical</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <h1> Practical Agami</h1>
        <!-- ./col -->
     
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  @endsection

@push('after-js')
@endpush