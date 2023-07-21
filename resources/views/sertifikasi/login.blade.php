<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LMS</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Sertifikasi Non Login</div>
        
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('postLoginSertifikasi') }}" novalidate>
                                {{ csrf_field() }}
        
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nama Lengkap</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                {{-- Email --}}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Alamat Email</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('sertifikasi') ? ' has-error' : '' }}">
                                    <label for="sertifikasi" class="col-md-4 control-label">Sertfikasi Yang Diambil</label>
        
                                    <div class="col-md-6">
                                        <select id="sertifikasi" name="sertifikasi" class="sertifikasi form-control">
                                            <option value="" disabled hidden selected>Silahkan Pilih</option>
                                            @foreach($modules as $module)
                                                <option value="{{ $module->id }}">{{ $module->name }}</option>
                                            @endforeach
                                            {{-- <option value="owner">Owner</option>
                                            <option value="karyawan">Karyawan</option> --}}
                                        </select>
                                        @if ($errors->has('sertifikasi'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sertifikasi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('kode') ? ' has-error' : '' }}">
                                    <label for="kode" class="col-md-4 control-label">Kode Sertifikasi</label>
        
                                    <div class="col-md-6">
                                        <input id="kode" type="kode" class="form-control" name="kode" required>
        
                                        @if ($errors->has('kode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('kode') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                {{-- <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div> --}}
        
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Mulai
                                        </button>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6 col-md-offset-4">
                                    <p>Sudah punya akun?<a class="btn btn-link" href="{{ route('login') }}">
                                        Login
                                    </a></p>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweetalert::alert')
</body>
</html>
