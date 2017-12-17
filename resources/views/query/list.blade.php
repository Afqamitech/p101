@extends('layouts.admin')
@section('title')
Missing Cashback Reports
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Missing Cashback Reports</a></li>
</ul>
<h2>Missing Cashback Reports</h2>
<hr>
<!--<a href="{{url('admin/create-category')}}" class="btn btn-primary">Add new</a>-->
<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Queries</th>
                <!--<th>Status</th>-->
                <th>Action</th>
                <!--<th>Delete</th>-->
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
        ajax: "{{ url('/admin/get-query-data') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'email', name: 'email'},
            {data: 'query', name: 'query'},
//            {data: 'status', name: 'status'},
//            {data: "status",
//                render: function (data, type, row) {
//                    if (type === 'display') {
//                        return '<select name="status">\n\
//                                <option value="0" @if('+row.status+'=="0") selected @endif>Pending</option>\n\
//                                <option value="1" @if('+row.status+'=="1") selected @endif>Approved</option>\n\
//                                <option value="2" @if('+row.status+'=="2") selected @endif>Paid</option>\n\
//                                </select>';
//                    }
//                    return data;
//                },
//                className: "dt-body-center"
//            },
//            {data: "update",
//                render: function (data, type, row) {
//                    if (type === 'display') {
//                        return '<a class="btn btn-primary" href="{{url("admin/category/update/")}}/' + row.id + '"><i class="fa fa-pencil"></i></a>';
//                    }
//                    return data;
//                },
//                className: "dt-body-center"
//            },
            {data: "delete",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-danger" href="{{url("admin/category/delete/")}}/' + row.id + '"><i class="fa fa-trash-o"></i></a>';
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