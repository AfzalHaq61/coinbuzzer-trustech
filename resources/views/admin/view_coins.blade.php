@extends('layouts.app2')

@section('content')

    <link rel="stylesheet" href="{{ url('vendor2/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{ url('vendor2/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor2/datatables/media/css/dataTables.bootstrap4.css')}}">



    <section role="main" class="content-body">
        <header class="page-header">
            <h2> View Coins</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Admin</span></li>
                    <li><span>View Coins</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->

        <section class="card mt-5">
            <header class="card-header">
                <div class="card-actions">

                </div>

                <h2 class="card-title">View Coins</h2>
            </header>
            <div class="card-body">
                <table  id="coins_table" class="table table-bordered table-striped"  >
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="20%"> Name</th>
                        <th width="25%">Symbol</th>
                        <th width="15%">Votes</th>
                        <th width="15%">Status</th>
                         <th width="25%">Price</th>
                        <th width="25%">Marketcap</th>
                        <th width="25%">Approved</th>
                        <th width="25%">Promoted</th>
                        <th width="15%">Added At</th>
                        <th width="35%">Action</th>

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
            $('#coins_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('get-coins') }}",
                "columns":[
                    { "data": "id", name:'id' },
                    { "data": "name", name:'name' },
                    { "data": "symbol", name:'symbol' },
                    { "data": "vote", name:'vote' },
                    { "data": "status", name:'status' },
                    { "data": "price_usd", name:'price_usd' },
                    { "data": "marketcap", name:'marketcap' },
                    { "data": "approved", name:'approved' },
                    { "data": "promoted", name:'promoted' },
                    { "data": "created_at", name:'created_at' },
                    { "data": "action", name:'action' },
                ]
            });


        });
        function del_coin(x)
        {
            
            console.log(x);

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
                    $.post('{{ route("delete-coin")}}',{id:x, _token:"{{csrf_token()}}"},function(res){
                        $("#loading").hide();

                        if(res.success==true){

                            swal("Deleted!",res.message, "success");
                            $('#coins_table').DataTable().ajax.reload();

                        }else if(res.success==false){
                            swal("Error!",data.message, "error");
                        }

                    });

                } else {
                    swal("Cancelled", "Your action has been cancelled!", "cancel");
                }

            });



        }

        function not_promoted(x)
        {

            Swal.fire({
                title: 'Are you sure?',
                text: "You may able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {


                if (result.value) {
                    $("#loading").show();
                    $.post('{{ route("not-promoted")}}',{id:x, _token:"{{csrf_token()}}"},function(res){
                        $("#loading").hide();

                        if(res.success==true){

                            swal("Success!",res.message, "success");
                            $('#coins_table').DataTable().ajax.reload();

                        }else if(res.success==false){
                            swal("Error!",data.message, "error");
                        }

                    });

                } else {
                    swal("Cancelled", "Your action has been cancelled!", "cancel");
                }

            });



        }
        function promoted(x)
        {

            Swal.fire({
                title: 'Are you sure?',
                text: "You may able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {


                if (result.value) {
                    $("#loading").show();
                    $.post('{{ route("promoted")}}',{id:x, _token:"{{csrf_token()}}"},function(res){
                        $("#loading").hide();

                        if(res.success==true){

                            swal("Success!",res.message, "success");
                            $('#coins_table').DataTable().ajax.reload();

                        }else if(res.success==false){
                            swal("Error!",data.message, "error");
                        }

                    });

                } else {
                    swal("Cancelled", "Your action has been cancelled!", "cancel");
                }

            });



        }
        function not_approved(x)
        {

            Swal.fire({
                title: 'Are you sure?',
                text: "You may able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {


                if (result.value) {
                    $("#loading").show();
                    $.post('{{ route("not-approved")}}',{id:x, _token:"{{csrf_token()}}"},function(res){
                        $("#loading").hide();

                        if(res.success==true){

                            swal("Success!",res.message, "success");
                            $('#coins_table').DataTable().ajax.reload();

                        }else if(res.success==false){
                            swal("Error!",data.message, "error");
                        }

                    });

                } else {
                    swal("Cancelled", "Your action has been cancelled!", "cancel");
                }

            });



        }
        function approved(x)
        {

            Swal.fire({
                title: 'Are you sure?',
                text: "You may able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, do it!'
            }).then((result) => {


                if (result.value) {
                    $("#loading").show();
                    $.post('{{ route("approved")}}',{id:x, _token:"{{csrf_token()}}"},function(res){
                        $("#loading").hide();

                        if(res.success==true){

                            swal("Success!",res.message, "success");
                            $('#coins_table').DataTable().ajax.reload();

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
