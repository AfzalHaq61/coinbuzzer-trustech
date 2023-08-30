@extends('layouts.app2')

@section('content')
    <link rel="stylesheet" href="{{ url('vendor2/pnotify/pnotify.custom.css') }}">
    <link rel="stylesheet" href="{{ url('vendor2/bootstrap-fileupload/bootstrap-fileupload.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor2/dropzone/basic.css') }}">
    <link rel="stylesheet" href="{{ url('vendor2/dropzone/dropzone.css') }}">


    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Place An Ad</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span></span></li>
                    <li><span>Place An Ad</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->
        <div class="row" >
            <div class="col-lg-12">
                <section class="card">
                    <form id="main_form"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Main Page First Ad</h2>
                        <p class="card-subtitle">
                            Place Main Page First Ad from here
                        </p>
                    </header>
                    <div class="card-body">

                        <input type="hidden"  name="id" value="1" >
                        <input type="hidden"  name="page" value="main" >

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload Main Page First Ad:</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                            </div>

                        </div>
                      <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 1])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="main_form_second"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Main Page Second Ad</h2>
                        <p class="card-subtitle">
                            Place Main Page Second Ad from here
                        </p>
                    </header>
                    <div class="card-body">

                        <input type="hidden"  name="id" value="8" >
                        <input type="hidden"  name="page" value="mainsecond" >

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload Main Page Second Ad:</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                            </div>

                        </div>
                      <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 8])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="main_form_third"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Main Page Third Ad</h2>
                        <p class="card-subtitle">
                            Place Main Page Third Ad from here
                        </p>
                    </header>
                    <div class="card-body">

                        <input type="hidden"  name="id" value="9" >
                        <input type="hidden"  name="page" value="mainthird" >

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload Main Page Third Ad:</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                            </div>

                        </div>
                      <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 9])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="main_form_forth"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Main Page Forth Ad</h2>
                        <p class="card-subtitle">
                            Place Main Page Forth Ad from here
                        </p>
                    </header>
                    <div class="card-body">

                        <input type="hidden"  name="id" value="10" >
                        <input type="hidden"  name="page" value="mainforth" >

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload Main Page Forth Ad:</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                            </div>

                        </div>
                      <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 10])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="main_form_fifth"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Main Page Fifth Ad</h2>
                        <p class="card-subtitle">
                            Place Main Page Fifth Ad from here
                        </p>
                    </header>
                    <div class="card-body">

                        <input type="hidden"  name="id" value="11" >
                        <input type="hidden"  name="page" value="mainfifth" >

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload Main Page Fifth Ad:</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                            </div>

                        </div>
                      <div class="form-group row">
                            <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 11])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="alltime_form"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">AllTime Page  Ad</h2>
                            <p class="card-subtitle">
                                Place AllTime Page Ad from here
                            </p>
                        </header>
                        <div class="card-body">

                            <input type="hidden"  name="id" value="2" >
                            <input type="hidden"  name="page" value="alltime" >

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload AllTime Page Ad:</label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 2])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="new_form"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">New Page  Ad</h2>
                            <p class="card-subtitle">
                                Place New Page Ad from here
                            </p>
                        </header>
                        <div class="card-body">

                            <input type="hidden"  name="id" value="3" >
                            <input type="hidden"  name="page" value="new" >

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload New Page Ad:</label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                                </div>
                            </div>
                       <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 3])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="marketcap_form"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">Marketcap Page  Ad</h2>
                            <p class="card-subtitle">
                                Place Marketcap Page Ad from here
                            </p>
                        </header>
                        <div class="card-body">

                            <input type="hidden"  name="id" value="4" >
                            <input type="hidden"  name="page" value="marketcap" >

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload Marketcap Page Ad:</label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                                </div>
                            </div>
                              <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 4])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="presale_form"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">Presale Page  Ad</h2>
                            <p class="card-subtitle">
                                Place Presale Page Ad from here
                            </p>
                        </header>
                        <div class="card-body">

                            <input type="hidden"  name="id" value="5" >
                            <input type="hidden"  name="page" value="presale" >

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload Presale Page Ad:</label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                                </div>
                            </div>
    <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 5])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="detail_form"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">Coin Detail Page  Ad</h2>
                            <p class="card-subtitle">
                                Place Coin Detail Page Ad from here
                            </p>
                        </header>
                        <div class="card-body">

                            <input type="hidden"  name="id" value="6" >
                            <input type="hidden"  name="page" value="detail" >

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload Coin Detail Page Ad:</label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                                </div>
                            </div>
    <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 6])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
                <section class="card">
                    <form id="watchlist_form"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">Watchlist Page  Ad</h2>
                            <p class="card-subtitle">
                                Place Watchlist Page Ad from here
                            </p>
                        </header>
                        <div class="card-body">

                            <input type="hidden"  name="id" value="7" >
                            <input type="hidden"  name="page" value="watchlist" >

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Upload Watchlist Page Ad:</label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="photo" value="" id="w4-last-name" required>
                                </div>
                            </div>
    <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Referral Url:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="referral_url" value="{{\App\Advertisement::where(['id' => 7])->pluck('referral_url')->first()}}" id="w4-last-name" required>
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
                    </form>
                </section>
            </div>
        </div>
        <!-- end: page -->
    </section>

@endsection
@section('scripts')

    <script src="{{ url('vendor2/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        $('#main_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#main_form_second').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#main_form_third').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#main_form_forth').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#main_form_fifth').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#alltime_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#new_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#marketcap_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#presale_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#detail_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
        $('#watchlist_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            $.ajax({
                url: "{{Route('ad-post')}}",
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
                        $('#gallery_table').DataTable().ajax.reload();

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
