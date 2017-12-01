@extends('layouts.admin')
@section('title')
Category
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-category')}}">Manage Category</a></li>
    <li><a href="javascript:void(0)">Create Category</a></li>
</ul>
<h2>Create Category</h2>
<hr>
<div class="info col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <input type="text" value="{{old('name')}}" name="name" placeholder="Category Name">
        @if ($errors->has('name'))
        <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
        @endif
        <br><br>
        <input type="text" value="{{old('icon')}}" name="icon" placeholder="Icon">
        @if ($errors->has('icon'))
        <span><strong class="text-danger">{{ $errors->first('icon') }}</strong></span>
        @endif
        
        <input type="file" value="{{old('image')}}" name="image">
        @if ($errors->has('image'))
        <span><strong class="text-danger" >{{ $errors->first('image') }}</strong></span>
        @endif
        <br><br>
        
        <input type="checkbox" checked="" data-toggle="switch"  value="1"/> is Featured
        <br>
        <input checked type="radio" value="1" name="status">Publish
        <input type="radio" value="0" name="status">Unpublish
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>
@endsection

