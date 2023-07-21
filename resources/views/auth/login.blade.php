@extends('layouts.app')
@section('title', 'Masuk | LMS')

@section('content')
<div class="container">
        <div class="main">
            <section class="signup">
                <!-- <img src="images/signup-bg.jpg" alt=""> -->
                <div class="container">
                    <div class="signup-content">
                        <form method="POST" id="signup-form" action="{{ route('login') }}" class="signup-form">
                            {{ csrf_field() }}
                            <h2 class="form-title">Masuk</h2>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-input" name="email" id="email" placeholder="Email" style="font-family: Segoe UI" value="{{ old('email') }}" required autofocus/>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: #cd0000;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-input" name="password" style="font-family: Segoe UI" id="password" placeholder="Password"/>
                                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong style="color: #cd0000;">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="agree-term" class="label-agree-term"><span><span></span></span><a href="{{ route('password.request') }}" style="text-decoration: none; color: grey; margin-left: 75%; font-family: Segoe UI;">Lupa Password?</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" id="submit" class="form-submit btn btn-login scrollto" value="Masuk">Masuk</button>
                            </div>
                        </form>
                        <p class="loginhere" style="font-family: Segoe UI;">
                            Belum punya akun? <a href="{{ route('register') }}" class="loginhere-link" style="font-family: Segoe UI;">Daftar</a>
                        </p>
                    </div>
                </div>
            </section>
    
        </div>
</div>
@endsection
