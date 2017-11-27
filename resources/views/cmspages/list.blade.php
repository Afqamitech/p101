@extends('layouts.admin')
@section('title')
CMS Pages
@endsection
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<section class="wrapper">

              <div class="container">
  <table id="users" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Post Title</th>
            <th>Tag</th>
        </tr>
    </thead>
  </table>
</div>
    </section>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/admin/get-cms-page-data') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
        ]
    });
});

          
@endsection