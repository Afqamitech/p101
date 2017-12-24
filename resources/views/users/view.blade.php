@extends('layouts.admin')
@section('title')
User Detail
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery-ui.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-users')}}">Users</a></li>
    <li><a href="javascript:void(0)">View Detail</a></li>
</ul>
<div class="cus-head">
    <h2>View Detail</h2>
</div>
<div class="info cust-form">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
        <label>Name</label>
        <input type="text" value="{{$user->name}}" readonly>      
            </div>
        <div class="col-sm-6 col-xs-12 form-group">
        <label>Flingal ID</label>
        <input type="text" value="{{$user->flingal_id}}" readonly>
        </div>
            </div>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
        <label>Email</label>
        <input type="text" value="{{$user->email_id}}" readonly>
            </div>
        <div class="col-sm-6 col-xs-12 form-group">
        <label>Mobile</label>
        <input type="text" value="{{$user->Mobile}}" readonly>
            </div>
            </div>
        <h2>Cashback Details</h2>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Current Flingal Account Balance</label>
                <input type="text" value="{{$user->amount}}" readonly>
            </div>
        <div class="col-sm-6 col-xs-12 form-group">
          <label>Pending Amount</label>
                <input type="text" value="{{$user->amount}}" readonly>
        </div>
        </div>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
          <label>Approved Amount</label>
                <input type="text" value="{{$user->amount}}" readonly>
            </div>
            <div class="col-sm-6 col-xs-12 form-group">
          <label>Paid Amount</label>
                <input type="text" value="{{$user->amount}}" readonly>
            </div>
            </div>
     <div class="cust-btn">
         <input type="button" value="Back" class="btn btn-primary" onclick="history.go(-1)">
     </div>
    </form>
</div>
@endsection
@section('footer')
<script src="{{url('public/backend/js/jquery-ui.js')}}"></script>
<script>
            
</script>
@endsection

