@extends('layouts.admin')
@section('title')
Slider
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery-ui.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-slider')}}">Manage Slider</a></li>
    <li><a href="javascript:void(0)">Create Slider</a></li>
</ul>
<div class="cus-head">
    <h2>Slider Image</h2>
</div>
<div class="info cust-form">
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}    
        <h4></h4>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <input checked type="radio" name="slider_link" value="0" onclick="getData(this.id)" id="none">None
                <input type="radio" name="slider_link" value="1" onclick="getData(this.id)" id="coupon">Coupon
                <input type="radio" name="slider_link" value="2" onclick="getData(this.id)" id="store">Store
            </div>
            <div class="col-sm-6 col-xs-12 form-group">
        <label>Slider Image</label>
        <input type="file" value="{{old('image')}}" name="image">
        @if ($errors->has('image'))
        <span><strong class="text-danger" >{{ $errors->first('image') }}</strong></span>
        @endif
            </div>
            </div>
        <div class="row ">
            <div class="col-sm-6 col-xs-12 form-group">
                <label id="label"></label>
                <select id="data" style="display: none" name="data">
                    
                </select>
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
function getData(id)
{
    var parameter='';
    if(id=='none')
    {
        $('#data').hide();
        $('#label').text('');
    }
    else if(id=='store')
    {
        parameter="store";
    }
    else
    {
        parameter='coupon';
    }
    if(parameter!='')
    {
      $.ajax({
            url: "{{url('/get-data')}}",
            type: "get", //send it through get method
            dataType: "json", //send it through get method
            data: {
                parameter: parameter,
            },
            success: function (response) {
                console.log(response);
                $('#data').html('');
                $('#data').show();
                if(parameter=="coupon")
                {
                    $('#label').text('Select Coupon');
                }
                else
                {
                    $('#label').text('Select Store');
                }
                response.forEach(function (obj, index) {
                $('#data').append('<option value="' + obj.url + '">' + obj.name + '</option>');
                })
            },
        });
    }
}
</script>
@endsection
