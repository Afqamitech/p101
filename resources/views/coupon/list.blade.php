@extends('layouts.admin')
@section('title')
Coupon
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Manage Coupon</a></li>
</ul>
<h2>Manage Coupon</h2>
<hr>
<a href="{{url('admin/create-coupon')}}" class="btn btn-primary">Add new</a>
<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                <th>Deal of the day</th>
                <th>Coupon Name</th>
                <th>Category</th>
                <th>Store</th>
                <th>Label</th>
                <th>Expiry Date</th>
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
        ajax: "{{ url('/admin/get-coupon-data') }}",
        columns: [
//            {data: "top_deal",
//                render: function (data, type, row) {
//                    if (type === 'display') {
//                        return '<input type="checkbox" checked value="'row.id'">';
//                    }
//                    return data;
//                },
//                className: "dt-body-center"
//            },
            {data: 'top_deal', name: 'top_deal'},
            {data: 'name', name: 'name'},
            {data: 'category', name: 'category'},
            {data: 'store', name: 'store'},
            {data: 'label', name: 'label'},
            {data: 'expiry_date', name: 'expiry_date'},
            {data: 'status', name: 'status'},
            {data: "update",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-primary" href="{{url("admin/coupon/update/")}}/' + row.id + '"><i class="fa fa-pencil"></i></a>';
                    }
                    return data;
                },
                className: "dt-body-center"
            },
            {data: "delete",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<a class="btn btn-danger" href="{{url("admin/coupon/delete/")}}/' + row.id + '"><i class="fa fa-trash-o"></i></a>';
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

function setTopDeal(val)
{
    $.ajax({
            url: "{{url('/set-top-deal')}}",
            type: "get", //send it through get method
            dataType: "json", //send it through get method
            data: {
                coupon_id: val,
            },
            success: function (response) {
                console.log(response);
            },
        });
}

function setStatus(id)
{
    if($('#'+id).text()=='Publish')
    {
        $('#'+id).text('Unpublish');
        $('#'+id).removeClass('label-success');
        $('#'+id).addClass('label-danger');
    }
    else
    {
        $('#'+id).text('Publish');
        $('#'+id).removeClass('label-danger');
        $('#'+id).addClass('label-success');
    }
    $.ajax({
            url: "{{url('/set-status')}}",
            type: "get", //send it through get method
            dataType: "json", //send it through get method
            data: {
                coupon_id: id,
            },
            success: function (response) {
                console.log(response);
            },
        });
}
</script>
@endsection