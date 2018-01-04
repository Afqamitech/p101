@extends('layouts.admin')
@section('title')
Global Values
@endsection
@section('content')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/global-value')}}">Manage Global Values</a></li>
    <li><a href="javascript:void(0)">Update Global Values</a></li>
</ul>
<div class="cus-head">
    <h2>Update Global Values</h2>
</div>
<div class="info cust-form">
    <form action="" method="post">
  {{ csrf_field() }}    
    <h4>{{$global_value->name}}</h4>
    <input type="text" value="{{$global_value->value}}" name="value">
    <br><br>
    <div class="cust-btn">
            <input type="submit" value="Submit">
        </div>
  </form>
</div>
@endsection

