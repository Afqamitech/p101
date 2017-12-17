@extends('layouts.admin')
@section('title')
Order History
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Order History Master</a></li>
</ul>
<h2>Order History Master</h2>
<hr>
<a href="{{url('admin/manage-order-history/create-order-history')}}" class="btn btn-primary">Add new</a>
<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Flingal Id</th>
                <th>Order Id</th>
                <th>Title</th>
                <th>Status</th>
                <th>Amount</th>
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
        ajax: "{{ url('/admin/get-order-history-data') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'flingal_id', name: 'flingal_id'},
            {data: 'order_id', name: 'order_id'},
            {data: 'title', name: 'title'},
            {data: 'status', name: 'status'},
            
            {data: 'amount', name: 'amount'},
            {data: 'created_at', name: 'created_at'},
              {data: "update",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-primary" href="{{url("admin/manage-order-history/update/")}}/' + row.id + '"><i class="fa fa-pencil"></i></a>';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
            
        ],
         "columnDefs": [{
    "defaultContent": "-",
    "targets": "_all"
  }]
    });
});
</script>
@endsection