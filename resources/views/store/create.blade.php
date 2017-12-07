@extends('layouts.admin')
@section('title')
Store
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-store')}}">Manage Store</a></li>
    <li><a href="javascript:void(0)">Create Store</a></li>
</ul>
<h2>Create Store</h2>
<hr>
<div class="info col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <label>Select Category</label>
        <select name="category">
            @foreach($categories as $category)
            <option value="{{$category->id}}" @if(old('category')==$category->id) selected @endif>{{$category->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('category'))
        <span><strong class="text-danger">{{ $errors->first('category') }}</strong></span>
        @endif
        <br><br>
        <input type="text" value="{{old('name')}}" name="name" placeholder="Store Name">
        @if ($errors->has('name'))
        <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
        @endif
        <br><br>
        <input type="text" value="{{old('link')}}" name="link" placeholder="Store Link">
        @if ($errors->has('link'))
        <span><strong class="text-danger">{{ $errors->first('link') }}</strong></span>
        @endif
        <br><br>
        <input type="text" value="{{old('offer_line')}}" name="offer_line" placeholder="Store Offer Line" accept="image/*">
        <br><br>
        <input type="file" value="{{old('image')}}" name="image">
        @if ($errors->has('image'))
        <span><strong class="text-danger">{{ $errors->first('image') }}</strong></span>
        @endif
        <br><br>
        <input checked type="radio" value="1" name="status">Publish
        <input type="radio" value="0" name="status">Unpublish
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>
@endsection

