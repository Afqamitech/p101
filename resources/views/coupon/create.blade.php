@extends('layouts.admin')
@section('title')
Coupon
@endsection
@section('content')
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-coupon')}}">Manage Coupon</a></li>
    <li><a href="javascript:void(0)">Create Coupon</a></li>
</ul>
<div class="cus-head">
    <h2>Create Coupon</h2>
</div>
<div class="info cust-form">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Coupon Type</label><br>
                <input id="coupon" checked type="radio" name="coupon_deal" value="0" @if(old('coupon_deal')==0) checked @endif>Coupon
                       <input id="deal" type="radio" name="coupon_deal" value="1" @if(old('coupon_deal')==1) checked @endif>Deal
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Name</label>
                <input type="text" value="{{old('name')}}" name="name" placeholder="Name">
                @if ($errors->has('name'))
                <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
            <div class="col-sm-6 col-xs-12 form-group" id="coupon_code">
                <label>Coupon Code</label>
                <input type="text" value="{{old('coupon_code')}}" name="coupon_code" placeholder="Coupon Code">
                @if ($errors->has('coupon_code'))
                <span><strong class="text-danger">{{ $errors->first('coupon_code') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Select Category</label>
                <select name="category" id="category">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                <span><strong class="text-danger">{{ $errors->first('category') }}</strong></span>
                @endif
            </div>
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Select Store</label>
                <select name="store" id="store">
                </select>
                @if ($errors->has('store'))
                <span><strong class="text-danger">{{ $errors->first('store') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-12 col-xs-12 form-group" id="sub_category_container">
                
            </div>
            </div>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Offer Line</label>
                <input type="text" value="{{old('offer_line')}}" name="offer_line" placeholder="Offer Line">
                @if ($errors->has('offer_line'))
                <span><strong class="text-danger">{{ $errors->first('offer_line') }}</strong></span>
                @endif
            </div>
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Cash back Rate Line</label>
                <input type="text" value="{{old('label')}}" name="label" placeholder="Cash back Rate Line">
                @if ($errors->has('label'))
                <br><br>
                <span><strong class="text-danger">{{ $errors->first('label') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label>Url</label>
                <input type="text" name="url" value="{{old('url')}}" placeholder="URL">
            </div>
            <div class="col-sm-6 col-xs-12 form-group">
                <label id='expiry_date_lael'>Expiry Date</label><br>
                <input type="date" name="expiry_date" value="{{old('expiry_date')}}">
                @if ($errors->has('expiry_date'))
                <span><strong class="text-danger" >{{ $errors->first('expiry_date') }}</strong></span>
                @endif
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
    $(document).ready(function () {
        if ($('#coupon').is(':checked'))
        {
            $('#coupon_code').show();
        }
        else
        {
            $('#coupon_code').hide();
        }
    })

    $('#coupon').click(function () {
        $('#coupon_code').show();
    })

    $('#deal').click(function () {
        $('#coupon_code').hide();
    })

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
                console.log(response);
                $('#store').html('');

                response.forEach(function (obj, index) {
                    $('#store').append('<option value="' + obj.id + '">' + obj.name + '</option>');
                })

            },
        });
        $.ajax({
            url: "{{url('/get-sub-category')}}",
            type: "get", //send it through get method
            dataType: "json", //send it through get method
            data: {
                category_id: category_id,
            },
            success: function (response) {
                console.log(response);
                $('#sub_category_container').html('');
                $('#sub_category_container').append('<label>Sub Category</label><br>');
                response.forEach(function (obj, index) {
                    $('#sub_category_container').append('<input type="checkbox" value="' + obj.id + '" name="sub_category[]">' + obj.name + '');
                })

            },
        });
    })
</script>
@endsection
