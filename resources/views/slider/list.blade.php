@extends('layouts.admin')
@section('title')
Slider
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Manage Slider</a></li>
</ul>
<h2>Manage Slider</h2>
<hr>
<a href="{{url('admin/create-slider')}}" class="btn btn-primary">Add new</a>
<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
<!--                <th>Is Featured</th>
                <th>Status</th>-->
                <th>Action</th>
                <th>Delete</th>
            </tr>
        </thead>
    </table>
</div>



@endsection
@section('footer')
<script src="{{url('/public/backend/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#users').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/admin/get-slider-data') }}",
        columns: [
            {data: 'id', name: 'id'},
//            {data: 'image', name: 'image'},
//            {data: 'is_featured', name: 'is_featured'},
//            {data: 'status', name: 'status'},
            {data: "image",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<img width="80px" src="{{url("public/backend/img/slider/thumb/")}}/' + row.image+ '">';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
            {data: "update",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-primary" href="{{url("admin/slider/update/")}}/' + row.id + '"><i class="fa fa-pencil"></i></a>';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
            {data: "delete",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-danger" href="{{url("admin/slider/delete/")}}/' + row.id + '"><i class="fa fa-trash-o"></i></a>';
                    }
                    return data;
                },
                className: "dt-body-center"
            }
        ]
    });
});
</script>
@endsection