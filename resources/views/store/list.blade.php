@extends('layouts.admin')
@section('title')
Store
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Manage Store</a></li>
</ul>
<h2>Manage Store</h2>
<hr>
<a href="{{url('admin/create-store')}}" class="btn btn-primary">Add new</a>
<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Store Name</th>
                <th>Category Name</th>
                <th>Status</th>
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
        ajax: "{{ url('/admin/get-store-data') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'category', name: 'category'},
            {data: 'status', name: 'status'},
            {data: "update",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-primary" href="{{url("admin/store/update/")}}/' + row.id + '"><i class="fa fa-pencil"></i></a>';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
            {data: "delete",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-danger" href="{{url("admin/store/delete/")}}/' + row.id + '"><i class="fa fa-trash-o"></i></a>';
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