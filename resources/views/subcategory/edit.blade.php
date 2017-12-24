@extends('layouts.admin')
@section('title')
Sub Category
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-subcategory')}}">Manage Sub Category</a></li>
    <li><a href="javascript:void(0)">Update Sub Category</a></li>
</ul>
<div class="cus-head">
    <h2>Update Category</h2>
</div>
<div class="info cust-form">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Category</label>
        <select name="category_id">
            @foreach($category as $cat)
            <option value="{{$cat->id}}" @if($subcategory->category_id==$cat->id) selected @endif>{{$cat->name}}</option>
            @endforeach
        </select>
            </div>
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Sub Category Name</label>
        <input type="text" value="{{old('name',$subcategory->name)}}" name="name" placeholder="Sub Category Name">
        @if ($errors->has('name'))
        <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
        @endif
            </div>
        <div class="cust-btn">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
@endsection
