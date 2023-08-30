@extends('layouts.app')

@section('content')

<section class="listing-form update-form">
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-3">

                <div class="listing-form">
                    <h1>Update Coin Information</h1>
                    <p>
                        To update coin information like the logo, contract address or social links, please fill out the form below.
                    </p>
                    <p>
                        Your request will be processed within 24 hours. You will be notified by email.
                    </p>




                    <form id="update_form" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="has-content">
                            <input type="hidden" name="listing_id">
                            <p><b>Please select the CoinBuzzer listing you want to update.</b></p>
                            <div class="field has-search update-search">
                                <div class="control has-icons-left">
                                    <input class="input" type="text" placeholder="Search for your coinsniper project...">
                                    <span class="icon is-small is-left"><i class="fas fa-search"></i></span>
                                </div>

                                <div class="results">
                                </div>

                                <div class="asset is-hidden">
                                    <img src="" alt="">
                                    <div class="titles">
                                        <h2></h2>
                                        <h3></h3>
                                    </div>
                                    <button class="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="has-content select-fields is-hidden">
                            <div class="field">
                                <label class="label">Please select which field(s) you want to update.</label>
                                <div class="select is-fullwidth">
                                    <select name="fields">
                                        <option value="0" selected>Select Field</option>
                                        <option value="image_url">Logo</option>
                                        <option value="network">Network</option>
                                        <option value="presale">Presale Status</option>
                                        <option value="presale_link">Presale Link</option>
                                        <option value="bsc_contract_address">Contract Address</option>
                                        <option value="description">Description</option>
                                        <option value="custom_dex_link">Custom Chart Link</option>
                                        <option value="custom_swap_link">Custom Swap Link</option>
                                        <option value="website_link">Website Link</option>
                                        <option value="launch_date">Launch Date</option>
                                        <option value="telegram_link">Telegram Link</option>
                                        <option value="twitter_link">Twitter Link</option>
                                        <option value="discord_link">Discord Link</option>
                                    </select>
                                </div>
                                <p class="small">You can select multiple fields.</p>
                            </div>
                        </div>

                        <div class="columns" data-field="image_url">
                            <div class="column is-4">
                                <div class="image-upload has-text-centered">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="image_url" value="" disabled>
                                    <div class="has-hidden-input">
                                        <input name="photo" type="file" class="is-hidden"/>
                                    </div>
                                    <div class="field has-text-centered">
                                        <label class="label">Logo Upload*</label>
                                    </div>
                                    <div class="has-image is-new"
                                         data-placeholder="http://coinsniper.net/assets/img/placeholder.jpg">
                                        <img src="http://coinsniper.net/assets/img/placeholder.jpg" alt="">
                                    </div>

                                    <p class="error"></p>
                                    <p class="message"></p>
                                </div>

                                <p><a href="#" class="hide-field">Remove this field</a></p>
                            </div>
                        </div>
                        <div data-field="network">
                            <div class="field">
                                <label class="label">Network/Chain*</label>
                                <div class="select is-fullwidth">
                                    <select name="network" disabled>
                                        <option value="bsc" selected>Binance Smart Chain (BSC)</option>
                                        <option value="eth" >Ethereum (ETH)</option>
                                        <option value="matic" >Polygon (MATIC)</option>
                                        <option value="trx" >Tron (TRX)</option>
                                    </select>
                                </div>
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="presale">
                            <label class="label">Project in presale phase?*</label>
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="presale" value="No" checked disabled>
                                    No
                                </label>
                                <label class="radio">
                                    <input type="radio" name="presale" value="Yes"  disabled>
                                    Yes
                                </label>
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="presale_link">
                            <label class="label">Presale link</label>
                            <div class="control">
                                <input name="presale_link"
                                       class="input "
                                       type="text" placeholder="https://dxsale.com/your-presale-link-here"
                                       value="" disabled>
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="bsc_contract_address">
                            <label class="label">Contract Address*</label>
                            <div class="control">
                                <input name="bsc_contract_address" disabled
                                       class="input "
                                       type="text" placeholder="0xB8c77482e45F1F44dE1745F52C74426C631bDD52" required
                                       value="">
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="description">
                            <label class="label">Description*</label>
                            <div class="control">
                                    <textarea name="description" maxlength="1048" disabled
                                              class="textarea "
                                              placeholder="Describe your coin here. What is the goal, plans, why is this coin unique?"
                                              required></textarea>
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="custom_dex_link">
                            <label class="label">Custom Chart Link*</label>
                            <div class="control">
                                <input name="custom_dex_link" disabled
                                       class="input "
                                       type="text" placeholder="https://dex.guru/..." required
                                       value="">
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="custom_swap_link">
                            <label class="label">Custom Swap Link*</label>
                            <div class="control">
                                <input name="custom_swap_link" disabled
                                       class="input "
                                       type="text" placeholder="https://apeswap.finance/..." required
                                       value="">
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="website_link">
                            <label class="label">Website link*</label>
                            <div class="control">
                                <input name="website_link" disabled
                                       class="input "
                                       type="text" placeholder="https://coinsniper.net" required
                                       value="">
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="launch_date">
                            <label class="label">Launch Date*</label>
                            <div class="control">
                                <div class="control">
                                    <div class="select">
                                        <select name="date_created_day" required disabled>
                                            <option value="">Day</option>
                                            <option
                                                value="1" >1</option>
                                            <option
                                                value="2" >2</option>
                                            <option
                                                value="3" >3</option>
                                            <option
                                                value="4" >4</option>
                                            <option
                                                value="5" >5</option>
                                            <option
                                                value="6" >6</option>
                                            <option
                                                value="7" >7</option>
                                            <option
                                                value="8" >8</option>
                                            <option
                                                value="9" >9</option>
                                            <option
                                                value="10" >10</option>
                                            <option
                                                value="11" >11</option>
                                            <option
                                                value="12" >12</option>
                                            <option
                                                value="13" >13</option>
                                            <option
                                                value="14" >14</option>
                                            <option
                                                value="15" >15</option>
                                            <option
                                                value="16" >16</option>
                                            <option
                                                value="17" >17</option>
                                            <option
                                                value="18" >18</option>
                                            <option
                                                value="19" >19</option>
                                            <option
                                                value="20" >20</option>
                                            <option
                                                value="21" >21</option>
                                            <option
                                                value="22" >22</option>
                                            <option
                                                value="23" >23</option>
                                            <option
                                                value="24" >24</option>
                                            <option
                                                value="25" >25</option>
                                            <option
                                                value="26" >26</option>
                                            <option
                                                value="27" >27</option>
                                            <option
                                                value="28" >28</option>
                                            <option
                                                value="29" >29</option>
                                            <option
                                                value="30" >30</option>
                                            <option
                                                value="31" >31</option>
                                        </select>
                                    </div>

                                    <div class="select">
                                        <select name="date_created_month" required disabled>
                                            <option value="">Month</option>
                                            <option
                                                value="1" >January</option>
                                            <option
                                                value="2" >February</option>
                                            <option
                                                value="3" >March</option>
                                            <option
                                                value="4" >April</option>
                                            <option
                                                value="5" >May</option>
                                            <option
                                                value="6" >June</option>
                                            <option
                                                value="7" >July</option>
                                            <option
                                                value="8" >August</option>
                                            <option
                                                value="9" >September</option>
                                            <option
                                                value="10" >October</option>
                                            <option
                                                value="11" >November</option>
                                            <option
                                                value="12" >December</option>
                                        </select>
                                    </div>

                                    <div class="select">
                                        <select name="date_created_year" required disabled>
                                            <option value="">Year</option>
                                            <option
                                                value="2022" >2022</option>
                                            <option
                                                value="2021" >2021</option>
                                            <option
                                                value="2020" >2020</option>
                                            <option
                                                value="2019" >2019</option>
                                            <option
                                                value="2018" >2018</option>
                                            <option
                                                value="2017" >2017</option>
                                            <option
                                                value="2016" >2016</option>
                                            <option
                                                value="2015" >2015</option>
                                            <option
                                                value="2014" >2014</option>
                                            <option
                                                value="2013" >2013</option>
                                            <option
                                                value="2012" >2012</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="telegram_link">
                            <label class="label">Telegram link*</label>
                            <div class="control">
                                <input name="telegram_link" disabled
                                       class="input "
                                       type="text" placeholder="https://t.me/coinsniper" required
                                       value="">
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="twitter_link">
                            <label class="label">Twitter link</label>
                            <div class="control">
                                <input name="twitter_link" disabled
                                       class="input "
                                       type="text" placeholder="https://twitter.com/coinsniper"
                                       value="">
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="field" data-field="discord_link">
                            <label class="label">Discord link</label>
                            <div class="control">
                                <input name="discord_link" disabled
                                       class="input "
                                       type="text" placeholder="https://discord.gg/coinsniper"
                                       value="">
                            </div>

                            <p><a href="#" class="hide-field">Remove this field</a></p>
                        </div>

                        <div class="submit is-hidden">
                            <div class="field">
                                <div class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" name="terms" required>
                                        I agree to the <a href="/terms-and-conditions" target="_blank">Terms and
                                            Conditions*</a>
                                    </label>
                                </div>
                            </div>

                            <div class="field">
                                <div id="recaptcha_submit"></div>
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" class="button is-success">SUBMIT UPDATE REQUEST</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



@section('scripts')
<script src="assets/js/croppie.js"></script>
<script>
    $(document).ready(function () {

        $('p.help.is-danger').each(function(i,e){
            $(e).parents('[data-field]').show()
        })

        // Selection of listing
        $('.update-search').on('click', '.result' ,function(e){
            e.preventDefault()
            let listing_id = $(this).attr('href').split('/coin/')[1]
            $('[name=listing_id]').val(listing_id)

            let name = $(this).find('h1').html()
            let symbol = $(this).find('h2').html()
            let img_url = $(this).find('img').attr('src')

            let asset = $('.update-search .asset')
            $(asset).find('h2').html(name)
            $(asset).find('h3').html(symbol)
            $(asset).find('img').attr('src', img_url)
            $(asset).removeClass('is-hidden')
            $('.update-search .results').html('')

            $('.select-fields').removeClass('is-hidden')
        })

        $('.update-search .asset .button').click(function(){
            $('[name=listing_id]').val('')
            $('.update-search .asset').addClass('is-hidden')
        })

        $('[name=fields]').change(function(){
            let field = $(this).val()
            $('[data-field="' + field +'"]').show()
            $(this).val(0)
            $('.submit.is-hidden').removeClass('is-hidden')
            $('[data-field="' + field +'"]').find('input,select,textarea').attr('disabled', false)
        })

        $('a.hide-field').click(function(e){
            e.preventDefault()
            $(this).parents('[data-field]').hide().find('input,select,textarea').attr('disabled', true)
        })

        // Image upload
        $('.image-upload .has-image:not(.cropping)').click(function () {
            $('.image-upload .has-image').removeClass('is-new')
            if (!$('.image-upload .has-image').hasClass('cropping'))
                $('[name=photo]').click()
        })

        let crop = false
        let error = $('.image-upload p.error')
        let message = $('.image-upload p.message')
        $('.has-hidden-input').on('change', '[name=photo]', function () {
            $(error).html('').hide()
            $(message).html('').hide()

            let file = this.files[0]
            console.log(file)
            if (file.size > 1000000) {
                $(error).html('File size cannot exceed 1MB').show()
                return;
            }

            if(file.type != "image/png" && file.type != "image/jpg" && file.type != "image/jpeg") {
                $(error).html('File must be .png or .jpg').show()
                return;
            }

            var url = URL.createObjectURL(file);
            var img = new Image;

            img.onload = function() {
                if(img.width > 200 || img.height > 200) {
                    $(error).html('File must be max 200x200 pixels').show()
                    return;
                }
                if(img.width != img.height) {
                    $(error).html('Image must be square (e.g. 150x150 pixels)').show()
                    return;
                }

                var formData = new FormData();
                formData.append('_token', $('.image-upload [name=_token]').val())
                formData.append('photo', file)

                $.ajax({
                    url: '{{ route("raw-image")}}',
                    type: 'POST',
                    data: formData, // The form with the file inputs.
                    processData: false,
                    contentType: false                    // Using FormData, no need to process data.
                }).done(function (response) {
                    console.log("Success: Files sent!", response);

                    $('[name=image_url]').val(response)
                    $('.image-upload .save').addClass('is-hidden')
                    $('.image-upload .has-image img').attr('src', response.url)
                    $('.image-upload .has-hidden-input').html('<input name="photo" type="file" class="is-hidden" />')
                    //
                    // $('.image-upload .has-image').addClass('cropping');
                    // $('.image-upload img').attr('src', response);
                    // crop = $('.image-upload img').croppie({
                    //     viewport: {
                    //         width: 175, height: 175, type: 'square'
                    //     }
                    // });
                    // $('.image-upload .save').removeClass('is-hidden')
                }).fail(function () {
                    console.log("An error occurred, the files couldn't be sent!");
                });
            }

            img.src = url;
        })

        // $('.image-upload .save').click(function () {
        //     $(message).html('').hide()
        //     crop.croppie('result', 'base64').then(function (image) {
        //         $.post('/submit/upload-cropped', {
        //             '_token': $('[name=_token]').val(),
        //             'image': image
        //         }, function (response) {
        //             crop.croppie('destroy')
        //             crop = false
        //             $('[name=image_url]').val(response)
        //             $('.image-upload .save').addClass('is-hidden')
        //             $('.image-upload .has-image').removeClass('cropping').html('<img/>')
        //             $('.image-upload img').attr('src', response)
        //             $('.image-upload .has-hidden-input').html('<input name="photo" type="file" class="is-hidden" />')
        //         })
        //     });
        // })

        $('.image-upload .remove').click(function () {
            $(this).addClass('is-hidden')
            $('.image-upload img').attr('src', $('.image-upload .has-image').data('placeholder'))
            $('.image-upload [name=photo_url]').val(null)
        })
    })


    $('#update_form').submit(function(){
        $("#loading").show();
        var dd = new FormData(this);
        $.ajax({
            url: "{{Route('coin-update')}}",
            data: dd,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (res) {
                $("#loading").hide();
                if (res.success == true) {

                    var url = "{{ route('thank-you')}}";

                    document.location.href = url;

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
