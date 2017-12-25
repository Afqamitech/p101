@extends('layouts.admin')
@section('title')
Create Order History
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery-ui.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-global-wallet')}}">Global Wallet Master</a></li>
    <li><a href="javascript:void(0)">{{$flag=="add"?"Add Amount":"Deduct Amount"}}</a></li>
</ul>
<h2>{{$flag=="add"?"Add Amount":"Deduct Amount"}}</h2>
<hr>
<div class="info col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <label>Current Flingal A/c Amount</label>
        <input type="text" value="{{$globalwallet->amount}}" readonly>
        
        <br><br>
        <label>{{$flag=="add"?"Add Amount":"Deduct Amount"}}</label>
        <input type="text" value="{{old('amount')}}" name="amount" placeholder="{{$flag=="add"?"Add Amount":"Deduct Amount"}}">
        @if ($errors->has('amount'))
        <span><strong class="text-danger">{{ $errors->first('amount') }}</strong></span>
        @endif
        <br><br>
     
        <input type="submit" value="Submit">
    </form>
</div>
@endsection
@section('footer')
<script src="{{url('public/backend/js/jquery-ui.js')}}"></script>
<script>
            
</script>
@endsection

