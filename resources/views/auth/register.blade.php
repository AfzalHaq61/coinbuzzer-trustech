@extends('layouts.app')

@section('content')

<section class="register">
    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="inner">
                    <h1>Register</h1>
                    <h2>Create your account at CoinBuzzer to unlock new features.</h2>


                    <form method="POST" action="{{ route('register') }}">
                       @csrf
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input @error('name') is-invalid @enderror" type="text" placeholder="Name" id="name" name="name" required value="">
                                @error('name')
                                <span class="invalid-feedback"   role="alert">
                                        <strong style="color: red !important;" >{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input @error('email') is-invalid @enderror" type="email" placeholder="Email"  id="email" name="email" required value="">
                                @error('email')
                                <span class="invalid-feedback"  role="alert">
                                        <strong style="color: red !important;" >{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input @error('password') is-invalid @enderror" type="password" placeholder="Password" id="password" name="password" required>
                                @error('password')
                                <span class="invalid-feedback"   role="alert">
                                        <strong style="color: red !important;" >{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Confirm Password</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Confirm Password" name="password_confirmation" id="password-confirm" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="field">
                            <div class="mtcaptcha"></div>
                        </div>



                        <div class="field">
                            <div class="control">
                                <input type="submit" value="Register" class="button is-success">
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('login') }}">
                                Already registered? Login here.
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
