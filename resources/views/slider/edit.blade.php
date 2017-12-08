@extends('layouts.admin')
@section('title')
Category
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery-ui.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-category')}}">Manage Category</a></li>
    <li><a href="javascript:void(0)">Update Category</a></li>
</ul>
<h2>Update Category</h2>
<hr>
<div class="info col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <label>Slider Image</label>
        <input type="file" value="{{old('image')}}" name="image">
        @if ($errors->has('image'))
        <span><strong class="text-danger" >{{ $errors->first('image') }}</strong></span>
        @endif
        <img width="80px" src="{{url('public/backend/img/slider/thumb/'.$slider->image)}}">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>
@endsection
