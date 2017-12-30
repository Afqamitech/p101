@extends('layouts.admin')
@section('title')
Manage Users
@endsection
@section('content')

<style>
    .search{
        width:100% !important;
        height: 50px;
    }
</style>
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Manage Users</a></li>
</ul>
<h2>Manage Users</h2>
<hr>

<div class="container">
    <div class="row text-center" style="margin-bottom:20px;">
        <form>
        <div class="col-md-1"></div>
        <div class="col-md-7"><input type="text" name="search" value="{{$request->has('search')?$request->search:''}}" placeholder="Enter flingal Id here" class="form-control search"></div>
        <div class="col-md-2"><input type="submit" value="Search" class="btn btn-info search"></div>
        </form>
    </div>
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                
                <th>Name</th>
                <th>Flingal ID</th>
                <th>Registered With</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            
             @if(count($users)>0)
            @foreach($users as $obj)
            <tr>
        <td>{{$obj->name}}</td>
        <td>{{$obj->flingal_id}}</td>
        <td>{{$obj->provider}}</td>
        <td>{{$obj->email_id}}</td>
        <td>{{$obj->created_at}}</td>
        <td>
            <a class="btn btn-info" href="{{url("admin/users/view/".$obj->id)}}"><i class="fa fa-eye" title="view"></i></a>
        </td>
        
            <tr>
            @endforeach
          @endif
        </thead>
    </table>
</div>



@endsection
@section('footer')
<script src="{{url('/public/backend/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
//    $('#users').DataTable({
//        processing: true,
//        serverSide: true,
//        ajax: "{{ url('/admin/users/get-user-data') }}",
//        columns: [
//            {data: 'id', name: 'id'},
//            {data: 'name', name: 'name'},
//            {data: 'flingal_id', name: 'flingal_id'},
//            {data: 'provider', name: 'provider'},
//            {data: 'email_id', name: 'email_id'},
//            {data: 'created_at', name: 'created_at'},
//            
//            
//            {data: "action",
//                render: function (data, type, row) {
//                    if (type === 'display') {
//                        return '<a class="btn btn-danger" href="{{url("admin/users/view/")}}/' + row.id + '"><i class="fa fa-eye"></i></a>';
//                    }
//                    return data;
//                },
//                className: "dt-body-center"
//            }
//        ],
//         "columnDefs": [{
//    "defaultContent": "-",
//    "targets": "_all"
//  }]
//    });
});
</script>
@endsection