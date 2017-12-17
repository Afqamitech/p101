@extends('layouts.admin')
@section('title')
Order History
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Global Wallet Master</a></li>
</ul>
<h2>Global Wallet Master</h2>
<hr>

<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
  
                <th>Name</th>
                <th>Flingal Id</th>
                <th>Amount</th>
                <th>Created At</th>
                <th>Add</th>
                <th>Deduct</th>
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
        ajax: "{{url('/admin/get-global-wallet-data')}}",
        columns: [
          
            {data: 'name', name: 'name'},
            {data: 'flingal_id', name: 'flingal_id'},
            {data: 'amount', name: 'amount'},
            {data: 'created_at', name: 'created_at'},
              {data: "Add",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-primary" href="{{url("admin/manage-global-wallet/update/")}}/' + row.id + '/add"><i class="fa fa-plus"></i></a>';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
              {data: "Deduct",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-primary" href="{{url("admin/manage-global-wallet/update/")}}/' + row.id + '/deduct"><i class="fa fa-minus"></i></a>';
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