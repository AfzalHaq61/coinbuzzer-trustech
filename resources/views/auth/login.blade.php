@extends('layouts.app')

@section('content')

<section class="login">
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="inner">
                    <h1>Login</h1>
                    <h2>Log in to get access to your CoinBuzzer account.</h2>

                    <form method="POST" action="{{ route('login') }}">
                         @csrf
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" required value="">
                                @error('email')
                                <span class="invalid-feedback"   role="alert">
                                        <strong style="color: red !important;" >{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red !important;" >{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <a href="{{ route('password.update') }}">
                            Forgot password?
                        </a>

                        <div class="field">
                            <div class="control">
                                <input type="submit" value="Login" class="button is-success">
                            </div>
                        </div>
                    </form>

                    <br>
                    <a href="{{ route('register') }}" class="button is-primary">No Account? Register Here</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
