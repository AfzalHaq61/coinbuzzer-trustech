@extends('layouts.app2')

@section('content')
    <link rel="stylesheet" href="{{ url('vendor2/pnotify/pnotify.custom.css') }}">
    <link rel="stylesheet" href="{{ url('vendor2/bootstrap-fileupload/bootstrap-fileupload.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor2/dropzone/basic.css') }}">
    <link rel="stylesheet" href="{{ url('vendor2/dropzone/dropzone.css') }}">
    <script src="{{ url('vendor2/tinymce/tinymce.min.js') }}"></script>


    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Request Detail</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Admin</span></li>
                    <li><span>Request Detail</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->
        <div class="row" >

            <div class="col-lg-12">


                    <section class="card">
                        <form id="logo_form"  method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">Request Detail Logo</h2>
                            <p class="card-subtitle">

                            </p>
                        </header>
                        <div class="card-body">

                            <input type="hidden"  name="id" value=" {!! isset($coin->id)? $coin->id: ''  !!} " >

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name"> Logo Url:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="url"  value=" {!! isset($coin->image)? $coin->image: ''  !!} " readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name"> Logo:</label>
                                <div class="col-lg-6">
                                    <img class="img-fluid" src="{!! isset($coin->image)? $coin->image: ''  !!}" width="145">
                                </div>
                            </div>

                         </div>
                        <footer class="card-footer">
                            <div class="row justify-content-end">

                            </div>
                        </footer>
                        </form>
                    </section>

                <section class="card">
                    <form id="details_form"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <header class="card-header">
                            <div class="card-actions">
                                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                            </div>

                            <h2 class="card-title">Request Detail</h2>
                            <p class="card-subtitle">
                                View Request Detail from here
                            </p>
                        </header>
                        <div class="card-body">

                            <input type="hidden"  name="id" value=" {!! isset($coin->id)? $coin->id: ''  !!} " >

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Name:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" value=" {!! isset($coin->name)? $coin->name: ''  !!}" id="w4-last-name" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-2">Network:</label>
                                <div class="col-lg-6">
                                    <select id="network" name="network"  class="form-control "  readonly>
                                        @if($coin->network == 'BSC')
                                            <option value="BSC" selected>Binance Smart Chain (BSC)</option>
                                            <option value="ETH" >Ethereum (ETH)</option>
                                            <option value="MATIC" >Polygon (MATIC)</option>
                                            <option value="TRX" >Tron (TRX)</option>
                                        @elseif($coin->network == 'ETH')
                                            <option value="BSC" >Binance Smart Chain (BSC)</option>
                                            <option value="ETH" selected>Ethereum (ETH)</option>
                                            <option value="MATIC" >Polygon (MATIC)</option>
                                            <option value="TRX" >Tron (TRX)</option>
                                        @elseif($coin->network == 'MATIC')
                                            <option value="BSC" >Binance Smart Chain (BSC)</option>
                                            <option value="ETH" >Ethereum (ETH)</option>
                                            <option value="MATIC" selected>Polygon (MATIC)</option>
                                            <option value="TRX" >Tron (TRX)</option>
                                        @elseif($coin->network == 'TRX')
                                            <option value="BSC" >Binance Smart Chain (BSC)</option>
                                            <option value="ETH" >Ethereum (ETH)</option>
                                            <option value="MATIC" >Polygon (MATIC)</option>
                                            <option value="TRX" selected>Tron (TRX)</option>
                                        @else
                                        @endif
                                     </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Presale: <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <div class="radio-custom radio-primary">
                                        <input id="awesome" name="presale" type="radio"  @if($coin->presale == 'Yes')checked @else
                                        @endif value="{!! isset($coin->presale)? $coin->presale: ''  !!}" readonly />
                                        <label for="awesome">Yes</label>
                                    </div>
                                    <div class="radio-custom radio-primary">
                                        <input id="very-awesome" name="presale" type="radio" @if($coin->presale == 'No')checked @else
                                        @endif value="{!! isset($coin->presale)? $coin->presale: ''  !!}" readonly/>
                                        <label for="very-awesome">No</label>
                                    </div>

                                    <label class="error" for="porto_is"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Presale Link(optional):</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="presale_link" value=" {!! isset($coin->presale_link)? $coin->presale_link: ''  !!}" id="w4-last-name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name"> Description:</label>
                                <div class="col-lg-9">
                                    <textarea  id="description" name="description" readonly> {!! isset($coin->description)? $coin->description: ''  !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Contract Address:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="contract_address" value=" {!! isset($coin->contract_address)? $coin->contract_address: ''  !!}" id="w4-last-name" readonly>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Custom Chart Link:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="chart_link" value=" {!! isset($coin->chart_link)? $coin->chart_link: ''  !!}" id="w4-last-name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Custom Swap Link:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="swap_link" value=" {!! isset($coin->swap_link)? $coin->swap_link: ''  !!}" id="w4-last-name" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Website Link:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="website_link" value=" {!! isset($coin->website_link)? $coin->website_link: ''  !!}" id="w4-last-name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Telegram Link:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="telegram_link" value=" {!! isset($coin->telegram_link)? $coin->telegram_link: ''  !!}" id="w4-last-name" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Launch Date:</label>
                                <div class="col-lg-6">
                                    <div class="input-group">
															<span class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fas fa-calendar-alt"></i>
																</span>
															</span>
                                        <input id="date" data-plugin-masked-input data-input-mask="99/99/9999" name="launch_date" value=" {!! isset($coin->launch_date)? $coin->launch_date: ''  !!}"placeholder="__/__/____" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Twitter Link:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="twitter_link" value=" {!! isset($coin->twitter_link)? $coin->twitter_link: ''  !!}" id="w4-last-name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label text-sm-right pt-1" for="w4-last-name">Discord Link:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="discord_link" value=" {!! isset($coin->discord_link)? $coin->discord_link: ''  !!}" id="w4-last-name" readonly>
                                </div>
                            </div>


                        </div>
                        <footer class="card-footer">
                            <div class="row justify-content-end">
                                <div class="col-sm-9">
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


    <script type="text/javascript">

        $(document).ready(function() {

            if ($("#description").length > 0) {
                tinymce.init({
                    selector: "textarea#description",
                    theme: "modern",
                    height: 500,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }
        });

        $('#details_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);
            dd.append("description",tinymce.get('description').getContent());

            $.ajax({
                url: "{{Route('coin-new')}}",
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
                                var url = "{{ route('view-coins')}}";

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
        $('#logo_form').submit(function(){
            $("#loading").show();
            var dd = new FormData(this);

            $.ajax({
                url: "{{Route('raw-image-update')}}",
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
                                var url = "{{ route('view-coins')}}";

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
