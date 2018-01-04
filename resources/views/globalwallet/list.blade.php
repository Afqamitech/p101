@extends('layouts.admin')
@section('title')
Order History
@endsection
@section('content')

<style>
    .search{
        width:100% !important;
        height: 50px;
    }
</style>
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Global Wallet Master</a></li>
</ul>
<h2>Global Wallet Master</h2>
<hr>

<div class="container">
    <div class="row text-center" style="margin-bottom:20px;">
        <form>
        <div class="col-md-1"></div>
        <div class="col-md-7"><input type="text" name="search" value="{{$request->has('search')?$request->search:''}}" placeholder="Enter flingal Id here" class="form-control search"></div>
        <div class="col-md-2"><input type="submit" value="Search" class="btn btn-info search"></div>
        </form>
    </div>
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
  
                
                <th>Flingal Id</th>
                <th>Amount(Cash-Back + Rewards)</th>
                <th>Created At</th>
                <th>Action</th>
                
            </tr>
            
           @if(count($globalwallet)>0)
            @foreach($globalwallet as $obj)
            <tr>
        <td>{{$obj->flingal_id}}</td>
        <td>{{$obj->reward_amount + $obj->cb_amount}}</td>
        <td>{{$obj->created_at}}</td>
        <td><a class="btn btn-primary" href="{{url("admin/manage-global-wallet/update/".$obj->id."/deduct")}}"><i class="fa fa-plus" title="Add Amount"></i></a>
        <a class="btn btn-primary" href="{{url("admin/manage-global-wallet/update/".$obj->id."/deduct")}}"><i class="fa fa-minus" title="Deduct Amount"></i></a></td>
        <tr>
            @endforeach
          @endif
        </thead>
    </table>
     @if(count($globalwallet)==0)
       
            <h2>No Record Found.</h2>
            @endif
</div>



@endsection
@section('footer')
<script src="{{url('/public/backend/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#asd').DataTable({
//        processing: false,
//        serverSide: false,
//        ajax: "{{url('/admin/get-global-wallet-data')}}",
//        columns: [
//            {data: 'flingal_id', name: 'flingal_id'},
//            {data: 'amount', name: 'amount'},
//            {data: 'created_at', name: 'created_at'},
//              {data: "Add",
//                render: function (data, type, row) {
//                    if (type === 'display') {
//                        return '<a class="btn btn-primary" href="{{url("admin/manage-global-wallet/update/")}}/' + row.id + '/add"><i class="fa fa-plus"></i></a>';
//                    }
//                    return data;
//                },
//                className: "dt-body-center"
//            },
//              {data: "Deduct",
//                render: function (data, type, row) {
//                    if (type === 'display') {
//                        return '<a class="btn btn-primary" href="{{url("admin/manage-global-wallet/update/")}}/' + row.id + '/deduct"><i class="fa fa-minus"></i></a>';
//                    }
//                    return data;
//                },
//                className: "dt-body-center"
//            },
//            
//        ],
//         "columnDefs": [{
//    "defaultContent": "-",
//    "targets": "_all"
//  }]
    });
});

$(document).ready(function(){
$("#users_filter").hide();
$(".dataTables_length").hide();
})
</script>
@endsection