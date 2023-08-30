@extends('layouts.app')

@section('content')


    <section class="listing-form update-form">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">

                    <div class="listing-form">
                        <h1>Thanks</h1>
                        <p>
                            Your update request has been received successfully. Thanks!
                        </p>
                        <p>
                            You will be updated per email if you request has been accepted or rejected.
                            We process your requests as soon as possible, several times per day.
                        </p>
                        <p>
                            Please do not send additional requests or emails since this will only slow the process.
                        </p>
                        <p>
                            Have a great day!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(document).scroll(function(){
            let scroll = $(document).scrollTop()
            let id = false
            $('.column.is-8 > div').each(function(i,elem) {
                let top = $(elem).position().top
                if(scroll - 50 > top) {
                    $('.active').removeClass('active')
                    id = $(elem).attr('id')
                }
            })

            $('.menu-list li a').each(function(i,e){
                if($(e).attr('href').indexOf(id) >= 0) {
                    $(e).parent().addClass('active')
                }
            })
        })
    })
</script>
@endsection
