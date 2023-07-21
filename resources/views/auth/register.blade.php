@extends('layouts.app')
@section('title', 'Daftar | LMS')

@section('content')
<div class="container">
    <div class="row">
        <div class="main">
            <section class="signup">
                <!-- <img src="images/signup-bg.jpg" alt=""> -->
                <div class="container">
                    <div class="signup-content">
                        <form method="POST" id="signup-form" class="signup-form" action="{{ route('register') }}" novalidate>
                            {{ csrf_field() }}

                            <h2 class="form-title">Daftar</h2>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" class="form-input" name="name" id="name" style="font-family: Segoe UI" placeholder="Nama Lengkap" required autofocus/>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: #cd0000;">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-input" name="email" id="email" style="font-family: Segoe UI" placeholder="Alamat Email" required/>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: #cd0000;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-input" name="password" id="password" style="font-family: Segoe UI" placeholder="Password" required/>
                                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color: #cd0000;">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input" name="password_confirmation" id="password-confirm" style="font-family: Segoe UI" placeholder="Konfirmasi Password" required/>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" id="submit" class="form-submit" value="Sign up">Daftar</button>
                            </div>
                        </form>
                        <p class="loginhere" style="font-family: Segoe UI">
                            Sudah punya akun? <a href="{{ route('login') }}" class="loginhere-link" style="font-family: Segoe UI">Masuk</a>
                        </p>
                    </div>
                </div>
            </section>
    
        </div>
    </div>
</div>
@endsection
