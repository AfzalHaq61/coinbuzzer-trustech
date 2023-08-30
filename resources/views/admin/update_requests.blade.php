@extends('layouts.app2')

@section('content')

    <link rel="stylesheet" href="{{ url('vendor2/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{ url('vendor2/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor2/datatables/media/css/dataTables.bootstrap4.css')}}">



    <section role="main" class="content-body">
        <header class="page-header">
            <h2> Coin Update Requests</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="index.html">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Admin</span></li>
                    <li><span>Coin Update Requests</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->

        <section class="card mt-5">
            <header class="card-header">
                <div class="card-actions">

                </div>

                <h2 class="card-title"> Coin Update Requests</h2>
            </header>
            <div class="card-body">
                <table  id="update_table" class="table table-bordered table-striped"  >
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="20%">Submitted By</th>
                        <th width="20%">Coin Name</th>
                        <th width="20%">Request Status</th>
                        <th width="15%">Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </section>


        <!-- end: page -->
    </section>

@endsection
@section('scripts')
    <!-- Specific Page Vendor -->
    <script src="{{ url('vendor2/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ url('vendor2/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ url('vendor2/pnotify/pnotify.custom.js') }}"></script>
    <script src="{{ url('vendor2/autosize/autosize.js') }}"></script>
    <script src="{{ url('vendor2/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
    <script src="{{ url('vendor2/dropzone/dropzone.js') }}"></script>
    <script src="{{ url('vendor2/select2/js/select2.js') }}"></script>
    <script src="{{ url('vendor2/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor2/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Examples -->
    <script src="{{ url('js2/examples/examples.wizard.js') }}"></script>
    <script src="{{ url('js2/examples/examples.advanced.form.js') }}"></script>
    <script src="{{ url('js2/examples/examples.datatables.ajax.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#update_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get-updates') }}",
                "columns":[
                    { "data": "id", name:'id' },
                    { "data": "submitted_by", name:'submitted_by' },
                    { "data": "name", name:'name' },
                    { "data": "request", name:'request' },
                    { "data": "action", name:'action' },
                ]
            });


        });

        function del_request(x)
        {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {


                if (result.value) {
                    $("#loading").show();
                    $.post('{{ route("delete-request")}}',{id:x, _token:"{{csrf_token()}}"},function(res){
                        $("#loading").hide();

                        if(res.success==true){

                            swal("Deleted!",res.message, "success");
                            $('#update_table').DataTable().ajax.reload();

                        }else if(res.success==false){
                            swal("Error!",data.message, "error");
                        }

                    });

                } else {
                    swal("Cancelled", "Your action has been cancelled!", "cancel");
                }

            });



        }
        function approve(x)
        {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {


                if (result.value) {
                    $("#loading").show();
                    $.post('{{ route("approve-update")}}',{id:x, _token:"{{csrf_token()}}"},function(res){
                        $("#loading").hide();

                        if(res.success==true){

                            swal("Deleted!",res.message, "success");
                            $('#update_table').DataTable().ajax.reload();

                        }else if(res.success==false){
                            swal("Error!",data.message, "error");
                        }

                    });

                } else {
                    swal("Cancelled", "Your action has been cancelled!", "cancel");
                }

            });



        }

        function reject(x)
        {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {


                if (result.value) {
                    $("#loading").show();
                    $.post('{{ route("reject-update")}}',{id:x, _token:"{{csrf_token()}}"},function(res){
                        $("#loading").hide();

                        if(res.success==true){

                            swal("Deleted!",res.message, "success");
                            $('#update_table').DataTable().ajax.reload();

                        }else if(res.success==false){
                            swal("Error!",data.message, "error");
                        }

                    });

                } else {
                    swal("Cancelled", "Your action has been cancelled!", "cancel");
                }

            });



        }
    </script>



@endsection
