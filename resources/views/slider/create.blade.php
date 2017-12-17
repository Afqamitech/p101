@extends('layouts.admin')
@section('title')
Slider
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery-ui.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-slider')}}">Manage Slider</a></li>
    <li><a href="javascript:void(0)">Create Slider</a></li>
</ul>
<h2>Create Slider</h2>
<hr>
<div class="info col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <label>Category Image</label>
        <input type="file" value="{{old('image')}}" name="image">
        @if ($errors->has('image'))
        <span><strong class="text-danger" >{{ $errors->first('image') }}</strong></span>
        @endif
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>
@endsection

