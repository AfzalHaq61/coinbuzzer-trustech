@extends('layouts.app')

@section('content')


<section class="listing-form">
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="message info">
                    Want a free Crypto Price Bot in your telegram group?<br>
                    1. Submit your coin with the form below<br>
                    2. Join <a target="_blank" href="{{\App\Setting::where(['id' => 1])->pluck('office')->first()}}">{{\App\Setting::where(['id' => 1])->pluck('office')->first()}}</a><br>
                    3. Ask the admins there for more info!
                </div>

                <div class="listing-form">
                    <h1>Submit new coin to CoinBuzzer</h1>
                    <p>Please fill out this form carefully to add a new coin to <a href="{{ route('/') }}">CoinBuzzer</a>. After
                        submission,
                        your
                        coin will be visible on the <a href="{{ route('new') }}" target="_blank">New Listings</a> page.
                        Get 500 votes to be
                        officially listed on <a href="{{ route('/') }}">CoinBuzzer</a>.</p>



                    <form id="submit_form" method="POST" enctype="multipart/form-data">

                        <div class="columns">
                            <div class="column is-4">
                                <div class="image-upload has-text-centered">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="image_url" value="">
                                    <div class="has-hidden-input">
                                        <input name="photo" type="file" class="is-hidden"/>
                                    </div>
                                    <div class="field has-text-centered">
                                        <label class="label">Logo Upload*</label>
                                    </div>
                                    <div class="has-image is-new"
                                         data-placeholder="https://coinbuzzer.me/assets/img/placeholder.jpg">
                                        <img src="https://coinbuzzer.me/assets/img/placeholder.jpg" alt="">
                                    </div>



                                    <p class="error"></p>
                                    <p class="message"></p>
                                </div>
                            </div>
                            <div class="column is-8">
                                <div class="field">
                                    <label class="label">Name*</label>
                                    <div class="control">
                                        <input name="name"
                                               class="input "
                                               type="text" placeholder="Bitcoin" required value="">
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">Symbol*</label>
                                    <div class="control">
                                        <input name="symbol"
                                               class="input "
                                               type="text" placeholder="BTC" required value="">
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label">Network/Chain</label>
                                    <div class="select">
                                        <select name="network">
                                            <option value="BSC" selected>Binance Smart Chain (BSC)</option>
                                            <option value="ETH" >Ethereum (ETH)</option>
                                            <option value="MATIC" >Polygon (MATIC)</option>
                                            <option value="TRX" >Tron (TRX)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Project in presale phase?*</label>
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="presale" value="No" checked>
                                    No
                                </label>
                                <label class="radio">
                                    <input type="radio" name="presale" value="Yes" >
                                    Yes
                                </label>
                            </div>
                        </div>


                        <div class="field is-hidden when-presale">
                            <a href="" target="_blank">
                                <div class="message info">
                                    Planning your presale or fair launch?<br>Consider our official launchpad partner!<br><br>
                                    <button class="button is-success">Contact Us For More Information</button>
                                </div>
                            </a>
                        </div>

                        <div class="field">
                            <label class="label contract-address-label ">Contract Address*</label>
                            <label class="label contract-address-label is-hidden">Contract Address (optional for presales)</label>
                            <div class="control">
                                <input name="contract_address"
                                       class="input "
                                       type="text" placeholder="0xB8c77482e45F1F44dE1745F52C74426C631bDD52" required
                                       value="">
                            </div>

                            <p class="help presale is-hidden">Your contract address will be hidden until your presale is finished.</p>
                        </div>

                        <div class="field presale-link is-hidden">
                            <label class="label">Presale link (optional)</label>
                            <div class="control">
                                <input name="presale_link"
                                       class="input "
                                       type="text" placeholder="https://dxsale.com/your-presale-link-here"
                                       value="" disabled>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Description*</label>
                            <div class="control">
                                    <textarea name="description" maxlength="1048"
                                              class="textarea "
                                              placeholder="Describe your coin here. What is the goal, plans, why is this coin unique?"
                                              required></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Custom chart link (optional)</label>
                            <div class="control">
                                <input name="chart_link"
                                       class="input "
                                       type="text" placeholder="https://dex.guru/token/0x...."
                                       value="">
                            </div>
                            <p class="help">By default, Poocoin (BSC) and Dextools (ETH) is used. Enter custom chart link here if you want to use it.</p>
                        </div>

                        <div class="field">
                            <label class="label">Custom swap link (optional)</label>
                            <div class="control">
                                <input name="swap_link"
                                       class="input "
                                       type="text" placeholder="https://apeswap.finance/..."
                                       value="">
                            </div>
                            <p class="help">By default, PancakeSwap v2 (BSC) and UniSwap (ETH) is used. Enter custom swap link here if you want to use it, like Apeswap.</p>
                        </div>

                        <div class="field">
                            <label class="label">Website link*</label>
                            <div class="control">
                                <input name="website_link"
                                       class="input "
                                       type="text" placeholder="https://coinbuzzer.me/" required
                                       value="">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Launch Date*</label>
                            <div class="control">
                                <div class="control">
                                    <div class="select">
                                        <select name="date_created_day" required>
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
                                        <select name="date_created_month" required>
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
                                        <select name="date_created_year" required>
                                            <option value="">Year</option>
                                            <option
                                                value="2023" >2023</option>
                                              <option
                                                value="2022" >2022</option>
                                            <option
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
                        </div>

                        <div class="field">
                            <label class="label">Telegram link*</label>
                            <div class="control">
                                <input name="telegram_link"
                                       class="input "
                                       type="text" placeholder="https://t.me/" required
                                       value="">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Twitter link</label>
                            <div class="control">
                                <input name="twitter_link"
                                       class="input "
                                       type="text" placeholder="https://twitter.com/"
                                       value="">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Discord link</label>
                            <div class="control">
                                <input name="discord_link"
                                       class="input "
                                       type="text" placeholder="https://discord.gg/"
                                       value="">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="terms" required>
                                    I agree to the <a href="{{ route('terms-and-conditions') }}" target="_blank">Terms and
                                        Conditions*</a>
                                </label>
                            </div>
                        </div>

                        <div class="field">
                            <div id="recaptcha_submit"></div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-success">SUBMIT COIN</button>
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
<script >
    $(document).ready(function () {

        $('[name=presale]').change(function(){
            $('p.presale, .when-presale').toggleClass('is-hidden')
            $('.contract-address-label').toggleClass('is-hidden')
            $('.presale-link').toggleClass('is-hidden')
            $('[name=presale_link]').attr('disabled', $('[name=presale_link]').is(':disabled') ? false : true)
            $('[name=bsc_contract_address]').attr('required', $('[name=bsc_contract_address]').is(':required') ? false : true)
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
            if (file.size > 300000) {
                $(error).html('File size cannot exceed 300kb').show()
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

                 $('[name=image_url]').val(response.url)
                $('.image-upload .save').addClass('is-hidden')
                  $('.image-upload .has-image img').attr('src', response)
                  $('.image-upload .has-hidden-input').html('<input name="photo" type="file" class="is-hidden" />')

                  $('.image-upload .has-image').addClass('cropping');
                    $('.image-upload img').attr('src', response.url);
                   $('.image-upload .save').removeClass('is-hidden')
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

    $('#submit_form').submit(function(){
        $("#loading").show();
        var dd = new FormData(this);
        $.ajax({
            url: "{{Route('coin-new')}}",
            data: dd,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (res) {
                $("#loading").hide();
                if (res.success == true) {

                    var url = "{{ route('new')}}";

                    document.location.href = url;

                }else {


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
