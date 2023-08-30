@extends('layouts.app')

@section('content')
    <section class="login">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="inner">
                        <h1>Forgot Password</h1>
                        <h2>Enter your email address below to reset your password.</h2>
                        @if (session('status'))
                            <div class="message">We have emailed your password reset link!</div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input class="input @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" required value="">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                                </div>
                            </div>

                            <a href="{{route('login')}}">
                                Back to login.
                            </a>

                            <div class="field">
                                <div class="control">
                                    <input type="submit" value="Email Password Reset Link" class="button is-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
