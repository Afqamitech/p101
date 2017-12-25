@extends('layouts.admin')
@section('title')
Store
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-store')}}">Manage Store</a></li>
    <li><a href="javascript:void(0)">Update Store</a></li>
</ul>
<div class="cus-head">
    <h2>Update Store</h2>
</div>
<div class="info cust-form">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <div class="row ">
            <div class="col-sm-12 col-xs-12 form-group">
                <label>Select Categories</label><br>
                @foreach($categories as $category)
                <input type="checkbox" name="category[]" value="{{$category->id}}"
                       @foreach($store->storeCategory as $cat)
                       @if($cat->category_id == $category->id)
                       checked
                       @endif
                       @endforeach
                       >{{$category->name}}
                       @endforeach
                       <br>
                @if ($errors->has('category'))
                <span><strong class="text-danger">{{ $errors->first('category') }}</strong></span>
                @endif
            </div>


        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Store Name</label>
                <input type="text" value="{{old('name',$store->name)}}" name="name" placeholder="Store Name">
                @if ($errors->has('name'))
                <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Store Link</label>
                <input type="text" value="{{old('link',$store->link)}}" name="link" placeholder="Store Link">
                @if ($errors->has('link'))
                <span><strong class="text-danger">{{ $errors->first('link') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Store Offer Line</label>
                <input type="text" value="{{old('offer_line',$store->offer_line)}}" name="offer_line" placeholder="Store Offer Line" accept="image/*">
            </div>
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Store Cash-Back Rate</label>
                <input type="text" name="cash_back" value="{{old('cash_back',$store->cash_back)}}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Store Description</label>
                <textarea name="description">{{old('description',$store->description)}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Store Image</label>
                <input type="file" value="{{old('image')}}" name="image">
                <img width="100px" height="100px" src="{{url('public/backend/img/store-image/'.$store->image)}}">
                @if ($errors->has('image'))
                <span><strong class="text-danger">{{ $errors->first('image') }}</strong></span>
                @endif
            </div>
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Status</label>
                <input checked type="radio" value="1" name="status" @if($store->status==1) checked @endif>Publish
                       <input type="radio" value="0" name="status" @if($store->status==0) checked @endif>Unpublish
            </div>
        </div>
        <div class="cust-btn">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>
@endsection

