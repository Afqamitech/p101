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
<h2>View Detail</h2>
<hr>
<div class="info col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <label>Name</label>
        <input type="text" value="{{$user->name}}" readonly>      
        <br><br>
        <label>Flingal ID</label>
        <input type="text" value="{{$user->flingal_id}}" readonly>
        
        <br><br>
        <label>Email</label>
        <input type="text" value="{{$user->email}}" readonly>
        
        <br><br>
        <label>Mobile</label>
        <input type="text" value="{{$user->Mobile}}" readonly>
        
        <h2>Cashback Details</h2>

        <label>Current Flingal Account Balance</label>
                <input type="text" value="{{$user->amount}}" readonly>

       
        <br><br>
        
          <label>Pending Amount</label>
                <input type="text" value="{{$user->amount}}" readonly>
          <label>Approved Amount</label>
                <input type="text" value="{{$user->amount}}" readonly>
          <label>Paid Amount</label>
                <input type="text" value="{{$user->amount}}" readonly>
        <br><br>
     
        <input type="button" value="Back" onclick="history.go(-1)">
    </form>
</div>
@endsection
@section('footer')
<script src="{{url('public/backend/js/jquery-ui.js')}}"></script>
<script>
            
</script>
@endsection

