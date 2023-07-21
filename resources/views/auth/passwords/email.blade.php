@extends('layouts.app')
@section('title', 'Reset Password')

@section('content')
<div class="container">
        <div class="main">
            <section class="signup">
                <!-- <img src="images/signup-bg.jpg" alt=""> -->
                <div class="container">
                    <div class="signup-content">
                        <form method="POST" id="signup-form" action="{{ route('password.email') }}" class="signup-form">
                            {{ csrf_field() }}
                            <h2 class="form-title">Reset</h2>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-input" name="email" id="email" placeholder="Email" style="font-family: Segoe UI" value="{{ old('email') }}" required autofocus/>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: #cd0000;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                            
                            <div class="form-group">
                                <button type="submit" name="submit" id="submit" class="form-submit btn btn-login scrollto" value="Reset" style="width: 40%; left: 30%;">Kirim Reset Link</button>
                            </div>
                            <br>
                            <br>
                            <br>
                        </form>
                        <p class="loginhere" style="font-family: Segoe UI;">
                            <a href="{{ route('landing-page') }}" class="loginhere-link" style="font-family: Segoe UI;">Kembali ke Beranda</a>
                        </p>
                    </div>
                </div>
            </section>
    
        </div>
</div>
@endsection
