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
<div class="info col-md-10">
    <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}  
        <div class="row col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <input type="text" value="{{old('name',$store->name)}}" name="name" placeholder="Store Name">
                @if ($errors->has('name'))
                <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
        </div>
        <!--<br><br>-->
        <div class="row col-md-12">
            <div class="col-md-8">
            <input type="text" value="{{old('link',$store->link)}}" name="link" placeholder="Store Link">
            @if ($errors->has('link'))
            <span><strong class="text-danger">{{ $errors->first('link') }}</strong></span>
            @endif
            <!--<br><br>-->
        </div>
            <div class="col-md-4"></div>
            
        </div>
        <div class="row col-md-12">
            <div class="col-md-8">
        <input type="text" value="{{old('offer_line',$store->offer_line)}}" name="offer_line" placeholder="Store Offer Line">
        </div>
            <div class="col-md-4"></div>
            
        </div>
        <div class="row col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-8">
        <input type="file" value="{{old('image')}}" name="image">
        <img width="100px" height="100px" src="{{url('public/backend/img/store-image/'.$store->image)}}">
        @if ($errors->has('image'))
        <span><strong class="text-danger">{{ $errors->first('image') }}</strong></span>
        @endif
        </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-8">
        <input checked type="radio" value="1" name="status" {{$store->status==1?'checked':''}}>Publish
        <input type="radio" value="0" name="status" {{$store->status==0?'checked':''}}>Unpublish
        </div>
        </div>
        <div class="row col-md-12" align='center'>
        <input type="submit" value="Submit">
        </div>
    </form>
</div>
@endsection

