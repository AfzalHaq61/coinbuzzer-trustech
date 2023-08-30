@extends('layouts.app2')

@section('content')
    <link rel="stylesheet" href="{{ url('vendor2/pnotify/pnotify.custom.css') }}">
    <link rel="stylesheet" href="{{ url('vendor2/bootstrap-fileupload/bootstrap-fileupload.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor2/dropzone/basic.css') }}">
    <link rel="stylesheet" href="{{ url('vendor2/dropzone/dropzone.css') }}">


    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Site Settings</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span></span></li>
                    <li><span>Site Settings</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->
        <div class="row" >

            <div class="col-lg-12">
                <form id="setting_form"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <section class="card">
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">Site Settings</h2>
                            <p class="card-subtitle">
                               Set Settings from here
                            </p>
                        </header>
                        <div class="card-body">

                            <input type="hidden"  name="id" value=" {!! isset($setting->id)? $setting->id: ''  !!} " >
                            <input type="hidden"  name="uid" value=" {!! isset($user->id)? $user->id: ''  !!} " >

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name"> General Email:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="email" value=" {!! isset($setting->email)? $setting->email: ''  !!}" id="w4-last-name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name"> Advertisement Email:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="ftext" value=" {!! isset($setting->ftext)? $setting->ftext: ''  !!}" id="w4-last-name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Telegram Link:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="office" value=" {!! isset($setting->office)? $setting->office: ''  !!}" id="w4-last-name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Twitter Link:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="address" value=" {!! isset($setting->address)? $setting->address: ''  !!}" id="w4-last-name" required>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name"> Admin UserName/Email:</label>
                                <div class="col-lg-6">
                                    <textarea class="form-control" name="username"  required>{!! isset($user->email)? $user->email: ''  !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name"> Admin Password:</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="password" value="" />
                                </div>
                            </div>


                        </div>
                        <footer class="card-footer">
                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </footer>
                    </section>
                </form>
            </div>
        </div>
        <!-- end: page -->
    </section>

@endsection
@section('scripts')

    <script src="{{ url('vendor2/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">

        $('#setting_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('setting.store')}}",
                data: dd,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (res) {
                    $("#loading").hide();
                    if (res.success == true) {

                        Swal.fire({
                            type: 'success',
                            title: 'Stored',
                            text: res.message,
                            showConfirmButton: true,

                        }).then((result) => {
                            if (result.value) {
                                var url = "{{ route('dashboard')}}";

                                document.location.href = url;


                            }
                        })
                        $('#category_table').DataTable().ajax.reload();

                    } else {


                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: res.message

                        })
                    }
                }
            });

            return false;
        });


    </script>


@endsection
