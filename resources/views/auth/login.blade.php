@extends('layouts.app')

@section('content')
<style>
    .box {
        color: white;
        text-align: center;
        font-family: Sans-serif;
    }

    .box input[type="email"],
    .box input[type="password"] {
        border: 0;
        background: none;
        display: block;
        margin: 5px auto;
        text-align: center;
        border: 2px solid goldenrod;
        padding: 14px 10px;
        width: 220px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.3s;
    }

    .box h1 {
        color: goldenrod;
        text-transform: uppercase;
        font-weight: 500;
    }

    .box input[type="email"]:focus {
        width: 280px;
        border-color: #cc165c;
        ;
    }

    .box input[type="password"]:focus {
        width: 250px;
        border-color: #cc165c;
        ;
    }

    .box button {
        border: 0;
        background: none;
        display: block;
        margin: 5px auto;
        text-align: center;
        border: 2px solid goldenrod;
        padding: 10px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.3s;
    }

    .box button:hover {
        background-color: #cc165c;
        ;
        border-color: whitesmoke;
    }

    .box a {
        color: white;
    }

    .box a:hover {
        color: #cc165c;
    }
</style>
<div class="container" style="background-color: black;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body" style="background-color: black;">
                    <form class="box" method="POST" action="{{ route('login') }}">
                        <h1>Login</h1>
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-sm-12">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                                @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">
                                    Didn't have an account yet ?
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
