@extends('layouts.admin')
@section('title')
Sub Category
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-subcategory')}}">Manage Sub Category</a></li>
    <li><a href="javascript:void(0)">Create Sub Category</a></li>
</ul>
<h2>Create Category</h2>
<hr>
<div class="info col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <select name="category_id">
            @foreach($category as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
        <input type="text" value="{{old('name')}}" name="name" placeholder="Sub Category Name">
        @if ($errors->has('name'))
        <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
        @endif
        <br>
<!--        <input checked type="radio" value="1" name="status">Publish
        <input type="radio" value="0" name="status">Unpublish-->
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>
@endsection
