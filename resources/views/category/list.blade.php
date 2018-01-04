@extends('layouts.admin')
@section('title')
Category
@endsection
@section('content')
<link href="{{url('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<ul class="breadcrumb">
    <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    <li><a href="javascript:void(0)">Manage Category</a></li>
</ul>
<h2>Manage Category</h2>
<hr>
<!--<a href="{{url('admin/create-category')}}" class="btn btn-primary">Add new</a>-->
<div class="container">
    <table id="users" class="table table-hover table-condensed" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Featured</th>
<!--                <th>Status</th>
                <th>Action</th>
                <th>Delete</th>-->
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
        ajax: "{{ url('/admin/get-category-data') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
//            {data: 'is_featured', name: 'is_featured'},
            {data: "featured",
                render: function (data, type, row) {
                    if (type === 'display') {
                        return '<input type="checkbox" name="feature" value="1" id="'+row.id+'" onclick="setFeatured(this.id)" if('+row.is_featured+'==1) checked>';
                    }
                    return data;
                },
                className: "dt-body-center"
            }
//            {data: 'status', name: 'status'},
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

function setFeatured(id)
{
    $.ajax({
            url: "{{url('/admin/set-featured')}}",
            type: "get", //send it through get method
            data: {
                category_id: id,
            },
            success: function (response) {
//                console.log(response);
                alert('save');
                
            },
        });
}
</script>
@endsection