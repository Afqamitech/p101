@extends('layouts.admin')
@section('title')
Global Values
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-store')}}">Manage Store</a></li>
    <li><a href="javascript:void(0)">Update Store</a></li>
</ul>
<h2>Update Store</h2>
<hr>
<div class="info col-md-12">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <input type="text" value="{{old('name',$store->name)}}" name="name" placeholder="Store Name">
        @if ($errors->has('name'))
        <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
        @endif
        <br><br>
        <input type="text" value="{{old('link',$store->link)}}" name="link" placeholder="Store Link">
        @if ($errors->has('link'))
        <span><strong class="text-danger">{{ $errors->first('link') }}</strong></span>
        @endif
        <br><br>
        <input type="text" value="{{old('offer_line',$store->offer_line)}}" name="offer_line" placeholder="Store Offer Line">
        <br><br>
        <input type="file" value="{{old('image')}}" name="image">
        <img width="100px" height="100px" src="{{url('public/backend/img/store-image/'.$store->image)}}">
        @if ($errors->has('image'))
        <span><strong class="text-danger">{{ $errors->first('image') }}</strong></span>
        @endif
        <br><br>
        <input checked type="radio" value="1" name="status" {{$store->status==1?'checked':''}}>Publish
        <input type="radio" value="0" name="status" {{$store->status==0?'checked':''}}>Unpublish
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>
@endsection

