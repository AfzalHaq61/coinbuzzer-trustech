@extends('layouts.app')

@section('content')
    <section class="login"> <div class="container">

            <div class="columns"> <div class="column is-6 is-offset-3">
                    <div class="inner"> <h1>Verify Email Address</h1> <h2>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</h2>
                        <br> <div class="message info">Please check your spam inbox as well!</div>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('verification.resend') }}"> @csrf
                            <div class="field"> <div class="control"> <input type="submit" value="Resend Verification Email" class="button is-success">
                                </div> </div> </form>
                        <form method="POST" action="https://coinsniper.net/logout"> <input type="hidden" name="_token" value="dCmrzmve70I7zwFxKmG2oIIUGACKWUKv1K3G6ykY"> <div class="field"> <div class="control"> <input type="submit" value="Log Out" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


