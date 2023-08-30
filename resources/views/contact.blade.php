@extends('layouts.app')

@section('content')


<section class="page">
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <div class="content">
                    <h1>Update Coin</h1>
                    <p>
                        Want to update your coin logo, contract address, description, launch date, or anything else?
                        The fastest way is to submit a request using our Update Request Form:
                    </p>
                    <a class="email" href="{{route('update-form')}}"><i class="fas fa-share-square"></i> Submit Request</a>
                    <br>
                    <p>
                        Your update request will be answered very quickly. You will be updated via email.
                    </p>
                </div>
            </div>
            <div class="column is-6">
                <div class="content">
                    <h1>Advertising</h1>
                    <p>
                        Want to promote your project? We offer Promoted Coin spots and Banner Ad spots.
                        For prices and information, please email us at:
                    </p>
                    <a class="email" href="#">
                        <i class="fa fa-envelope"></i><span class="__cf_email__" data-cfemail="{{\App\Setting::where(['id' => 1])->pluck('ftext')->first()}}">{{\App\Setting::where(['id' => 1])->pluck('ftext')->first()}}</span>
                    </a>
                </div>
                <div class="content">
                    <h1>General Inquiries</h1>
                    <p>
                        For anything else, please email us at:
                    </p>
                    <a class="email" href="#">
                        <i class="fa fa-envelope"></i><span class="__cf_email__" data-cfemail="{{\App\Setting::where(['id' => 1])->pluck('email')->first()}}">{{\App\Setting::where(['id' => 1])->pluck('email')->first()}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
