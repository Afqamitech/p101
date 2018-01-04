@extends('layouts.admin')
@section('title')
CMS Pages
@endsection
@section('content')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/cms-page')}}">Manage CMS Pages</a></li>
    <li><a href="javascript:void(0)">Edit CMS Pages</a></li>
</ul>
<div class="cus-head">
    <h2>Update CMS Pages</h2>
</div>
<div class="info cust-form">
    <form action="" method="post">
  {{ csrf_field() }}    
    <h4>{{$cmspage->name}}</h4>
    <br><br>
    <textarea type="text" id="lname" name="description" placeholder="description..">{!!old('description',$cmspage->description)!!}</textarea>
    <br><br>
    <input type="radio" name="status" value="1" @if(old('status',$cmspage->status)=='1') checked @endif>Publish
    <input type="radio" name="status" value="0" @if(old('status',$cmspage->status)=='0') checked @endif>Unpublish
    
  <br><br>
    <div class="cust-btn">
            <input type="submit" value="Submit">
        </div>
  </form>
</div>
@endsection
@section('footer')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'lname' );
</script>

@endsection

