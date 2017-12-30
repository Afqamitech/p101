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
                <th>Flingal Id</th>
           
                <th>Redeem Type<br>(cashback/rewards)</th>
                <th>Redeem Amount</th>
                <th>Payment Type</th>
                <th>Contact No.</th>
                <th>Status</th>
                <th>Date</th>
                <!--<th>Action</th>-->
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
            {data: 'flingal_id', name: 'flingal_id'},
     
            {data: 'redeem_type', name: 'redeem_type'},
            {data: 'redeem_amount', name: 'redeem_amount'},
            {data: 'payment_type', name: 'payment_type'},
            {data: 'mobile', name: 'mobile'},
                {data: "status",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<select name="status" id="status_'+row.flingal_id+'" onchange="return setStatus('+row.id+',this)">\n\
                                <option value="0" @if('+row.status+'==0) selected @endif>Pending</option>\n\
                                <option value="1" @if('+row.status+'==1) selected @endif>Paid</option>\n\
                                </select>';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
            {data: 'created_at', name: 'created_at'},
//            {data: "update",
//                render: function (data, type, row) {
//                    if (type === 'display') {
//                        return '<a class="btn btn-primary" href="{{url("admin/category/update/")}}/' + row.id + '"><i class="fa fa-pencil"></i></a>';
//                    }
//                    return data;
//                },
//                className: "dt-body-center"
//            },
//            {data: "delete",
//                render: function (data, type, row) {
//                    if (type === 'display') {
//                        return '<a class="btn btn-danger" href="{{url("admin/category/delete/")}}/' + row.id + '"><i class="fa fa-trash-o"></i></a>';
//                    }
//                    return data;
//                },
//                className: "dt-body-center"
//            }
        ]
    });
});

function setStatus(id,ele) {


if(!confirm("Are you sure to change status?"))
{
    $(ele).val(0);
    return false;
}
        var status = $(ele).val();
        
//        alert(customer_id);
        $.ajax({
            url: "{{url('/admin/set-status')}}",
            type: "get", //send it through get method
            data: {
                status: status,
                id: id,
            },
            success: function (response) {
//                console.log(response);
                location.reload();
                
            },
        });
    }
</script>
@endsection