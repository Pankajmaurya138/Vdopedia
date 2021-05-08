@extends('layout.app_new')
<div id="trending">
@section('breadcrumb')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="@if(!empty(Auth::user()->id)){{ route('home')}} @else {{ url('/') }} @endif">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span>users-list
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
@section('body-content')
    <div class="container">
        <div class="row">
            <div class="large-12 columns">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="large-3"> Filter
                            <select id="table-filter">
                                <option value="">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">InAcive</option>
                            </select>
                        </div>
                     </div>
                    <div class="panel-body">
                        <table id="table" class="table table-hover table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection

@section('script')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/JavaScript" id="playfile" class="content_reload">
$(document).ready(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        "bFilter": true,
        
        ajax: "{{ route('userlistgetdata') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'action', name: 'action'},
        ]
    });

    oTable = $('#table').dataTable();

      $('#table-filter').change( function() { 
            oTable.fnFilter( $(this).val() ); 
       });
    
});
    
$(document).on('change','.active_users',function(){
    var value = $(this).val();
    var _token = "{{csrf_token()}}";
    $.ajax({
        url:"{{route('userStatusUpdate')}}",
        type:"post",
        data:{value:value,_token:_token},
        success:function(res) {
            if(res.status == true){
                swal({
                    title: "User Status",
                    text: res.msg,
                    icon: "success",
                    button: "close",
                    timer: 1000,
                });
            }
        }
    });
});

</script>


@endsection
</div>