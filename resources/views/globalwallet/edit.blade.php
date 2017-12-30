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
<div class="cus-head">
    <h2>{{$flag=="add"?"Add Amount":"Deduct Amount"}}</h2>
</div>
<div class="info cust-form">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        
         <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Select Wallet Type</label>
                &nbsp;&nbsp;&nbsp;<input type="radio" checked="" name="wallet_type" value="1"> Cash-Back <input type="radio" value="2" name="wallet_type"> Rewards

            </div>
         </div>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Current Wallet Amount</label>
                <input type="text" id="current_cb_amount" value="{{$globalwallet->cb_amount}}" readonly>
                <input type="text" style="display:none" id="current_rewards_amount" value="{{$globalwallet->reward_amount}}" readonly>

            </div>
            <div class="col-sm-6 col-xs-12 form-group">
                <label>{{$flag=="add"?"Add Amount":"Deduct Amount"}}</label>
                <input type="text" value="{{old('amount')}}" name="amount" placeholder="{{$flag=="add"?"Add Amount":"Deduct Amount"}}">
                @if ($errors->has('amount'))
                <span><strong class="text-danger">{{ $errors->first('amount') }}</strong></span>
                @endif
            </div>
            <div class="cust-btn">
                <input type="submit" value="Submit">
            </div>
    </form>
</div>
@endsection
@section('footer')
<script src="{{url('public/backend/js/jquery-ui.js')}}"></script>
<script>
$("[name='wallet_type']").click(function(){
    if($(this).val() =='1')
    {
        $("#current_cb_amount").show();
        $("#current_rewards_amount").hide();
    }else{
        $("#current_cb_amount").hide();
        $("#current_rewards_amount").show();
    }
})
</script>
@endsection

