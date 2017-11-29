@extends('layouts.admin')
@section('title')
CMS Pages
@endsection
@section('content')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="{{url('admin/manage-pages')}}">Manage CMS Pages</a></li>
    <li><a href="javascript:void(0)">Manage CMS Pages</a></li>
</ul>
<h2>Update CMS Pages</h2>
<hr>
<div class="info col-md-12">
    <form action="" method="post">
  {{ csrf_field() }}    
    <h4>{{$cmspage->name}}</h4>
    <br><br>
    <textarea type="text" id="lname" name="description" placeholder="description..">{{old('description',$cmspage->name)}}</textarea>
    <br><br>
    <input type="radio" name="status" value="1" @if(old('status',$cmspage->status)=='1') checked @endif>Publish
    <input type="radio" name="status" value="0" @if(old('status',$cmspage->status)=='0') checked @endif>Unpublish
    
  <br><br>
    <input type="submit" value="Submit">
  </form>
</div>


@endsection
@section('footer')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'lname' );
</script>

@endsection

