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
        <h2>Account Details</h2>
        <div class="row ">
            <div class="col-md-4 col-xs-12 form-group">
                <h4>Cash-Back Details</h4>
                <div>
                <label>Pending</label>
                <label> <i class='fa fa-rupee'></i>{{$user->pendingCashBackAmount->sum('amount')}}</label>
                
                </div>
                <div>
                <label>Approved</label>
                <label><i class='fa fa-rupee'></i>{{$user->approvedAmount->cb_amount}}</label>
                </div>
                <div>
                <label>Paid</label>
                <label><i class='fa fa-rupee'></i>{{$user->paidCashBackAmount->sum('redeem_amount')}}</label>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 form-group">
                <h4>Rewards Details</h4>
                <div>
                <label>Pending</label>
                <label><i class='fa fa-rupee'></i>{{$user->pendingRewardAmount->sum('amount')}}</label>
                </div>
                <div>
                <label>Approved</label>
                <label><i class='fa fa-rupee'></i>{{$user->approvedAmount->reward_amount}}</label>
                </div>
                <div>
                <label>Paid</label>
                <label> <i class='fa fa-rupee'></i>{{$user->paidRewardAmount->sum('redeem_amount')}}</label>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 form-group">
                <h4>Referal Details</h4>
                <div>
                    <label>Pending</label>
                <label><i class='fa fa-rupee'></i>1230</label>
                
                </div>
                <div>
                <label>Approved</label>
                <label> <i class='fa fa-rupee'></i>{{$user->approvedAmount->refral_amount!=null?$user->approvedAmount->refral_amount:'0'}}</label>
                </div>
                <div>
                <label>Paid</label>
                <label><i class='fa fa-rupee'></i>1230</label>
                </div>
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

