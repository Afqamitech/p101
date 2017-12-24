@extends('layouts.admin')
@section('title')
Coupon
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-coupon')}}">Manage Coupon</a></li>
    <li><a href="javascript:void(0)">Update Coupon</a></li>
</ul>
<div class="cus-head">
    <h2>Update Coupon</h2>
</div>
<div class="info cust-form">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Select Category</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(old('category')==$category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                <span><strong class="text-danger">{{ $errors->first('category') }}</strong></span>
                @endif
            </div>
                <div class="col-sm-6 col-xs-12 form-group">
                <label>Select Store</label>
                <select name="store" id="store">
                    <option value="{{$coupon->store->id}}">{{$coupon->store->name}}</option>
                </select>
                @if ($errors->has('store'))
                <span><strong class="text-danger">{{ $errors->first('store') }}</strong></span>
                @endif
            </div>
            </div>
                <div class="row ">
                    <div class="col-sm-6 col-xs-12 form-group">
                        <label>Coupon Name</label>
                        <input type="text" value="{{old('name',$coupon->name)}}" name="name" placeholder="Coupon Name">
                        @if ($errors->has('name'))
                        <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                        <div class="col-sm-6 col-xs-12 form-group">
                            <label>Label</label>
                        <input type="text" value="{{old('label',$coupon->label)}}" name="label" placeholder="Label">
                        @if ($errors->has('label'))
                        <span><strong class="text-danger">{{ $errors->first('label') }}</strong></span>
                        @endif
                    </div>
                    </div>
                        <div class="row ">
                            <div class="col-sm-6 col-xs-12 form-group">
                                <label>Offer Line</label>
                                <input type="text" value="{{old('offer_line',$coupon->offer_line)}}" name="offer_line" placeholder="Offer Line">
                                @if ($errors->has('offer_line'))
                                <span><strong class="text-danger">{{ $errors->first('offer_line') }}</strong></span>
                                @endif
                            </div>
                            <div class="col-sm-6 col-xs-12 form-group">
                                <label>Coupon Image</label>
                                <input type="file" value="{{old('image')}}" name="image">
                                @if ($errors->has('image'))
                                <span><strong class="text-danger" >{{ $errors->first('image') }}</strong></span>
                                @endif
                                <img width="80px" src="{{url('public/backend/img/coupon-image/thumb/'.$coupon->image)}}">
                            </div>
                            </div>
                                <div class="row ">
                                    <div class="col-sm-6 col-xs-12 form-group">
                                        <input type="checkbox" name="deal_of_the_day" data-toggle="switch" @if($coupon->deal_of_the_day==1) checked @endif  value="{{old('deal_of_the_day',1)}}"/> Deal Of The Day
                                    </div>
                                    <div class="col-sm-6 col-xs-12 form-group">
                                        <lavel id='expiry_date_lael'>Expiry Date</lavel>
                                        <br>
                                        <input type="date" name="expiry_date" value="{{old('expiry_date',$coupon->expiry_date)}}">
                                        @if ($errors->has('expiry_date'))
                                        <span><strong class="text-danger" >{{ $errors->first('expiry_date') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-sm-6 col-xs-12 form-group">
                                        <label>Status</label><br>
                                        <input type="radio" value="1" name="status" @if($coupon->status==1) checked @endif>Publish
                                               <input type="radio" value="0" name="status" @if($coupon->status==0) checked @endif>Unpublish
                                    </div>
                                </div>
                                <div class="cust-btn">
                                    <input type="submit" value="Submit">
                                </div>
                                </form>
                            </div>
                            @endsection
                            @section('footer')
                            <script>
                                $('#category').change(function () {
                                    var category_id = $('#category').val();
                                    $.ajax({
                                        url: "{{url('/get-store')}}",
                                        type: "get", //send it through get method
                                        dataType: "json", //send it through get method
                                        data: {
                                            category_id: category_id,
                                        },
                                        success: function (response) {
                            //                console.log(response);
                                            $('#store').html('');
                                            response.forEach(function (obj, index) {
                                                $('#store').append('<option value="' + obj.id + '">' + obj.name + '</option>');
                                            })

                                        },
                                    });
                                })
                            </script>
                            @endsection
