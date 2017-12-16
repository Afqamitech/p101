@extends('layouts.admin')
@section('title')
Redeem Master
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Redeem Master</a></li>
</ul>
<h2>Redeem Master</h2>
<hr>
<!--<a href="{{url('admin/create-category')}}" class="btn btn-primary">Add new</a>-->
<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Redeem Amount</th>
                <th>Payment Type</th>
                <th>Status</th>
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
        ajax: "{{ url('/admin/get-redeem-data') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'redeem_amount', name: 'redeem_amount'},
//            {data: 'status', name: 'status'},
            {data: "payment",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<select name="payment">\n\
                                <option value="0">Paytm</option>\n\
                                <option value="1">Bank Account</option>\n\
                                <option value="2">Airtel</option>\n\
                                </select>';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
                {data: "status",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<select name="status" id="status_'+row.user_id+'" onchange="setStatus(this.id)">\n\
                                <option value="0" if('+row.status+'=="0") selected>Pending</option>\n\
                                <option value="1" if('+row.status+'=="1") selected>Approved</option>\n\
                                <option value="2" if('+row.status+'=="2") selected>Paid</option>\n\
                                </select>';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
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
        ]
    });
});

function setStatus(id) {

        var status = $('#'+id).val();
        var customer_id = id.slice(7);
//        alert(customer_id);
        $.ajax({
            url: "{{url('/admin/set-status')}}",
            type: "get", //send it through get method
            data: {
                status: status,
                customer_id: customer_id,
            },
            success: function (response) {
//                console.log(response);
                alert('save');
                
            },
        });
    }
</script>
@endsection