@extends('layouts.admin')
@section('title')
Manage Users
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Manage Users</a></li>
</ul>
<h2>Manage Users</h2>
<hr>

<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Flingal ID</th>
                <th>Registered With</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Action</th>
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
        ajax: "{{ url('/admin/users/get-user-data') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'flingal_id', name: 'flingal_id'},
            {data: 'provider', name: 'provider'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            
            
            {data: "action",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-danger" href="{{url("admin/users/view/")}}/' + row.id + '"><i class="fa fa-eye"></i></a>';
                    }
                    return data;
                },
                className: "dt-body-center"
            }
        ],
         "columnDefs": [{
    "defaultContent": "-",
    "targets": "_all"
  }]
    });
});
</script>
@endsection