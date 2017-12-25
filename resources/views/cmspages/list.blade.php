@extends('layouts.admin')
@section('title')
CMS Pages
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Manage CMS Pages</a></li>
</ul>
<h2>Manage CMS Pages</h2>
<hr>

<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
         
                <th>Status</th>
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
        ajax: "{{ url('/admin/get-cms-page-data') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: "update",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-primary" href="{{url("admin/cms-page/update/")}}/' + row.id + '"><i class="fa fa-pencil"></i></a>';
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