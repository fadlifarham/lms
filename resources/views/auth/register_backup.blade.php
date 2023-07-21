@extends('layouts.app')
@section('title', 'Daftar | LMS')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Sebagai Anggota Baru</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" novalidate>
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

                        {{-- Status Select --}}
                        {{-- <div class="form-group{{ $errors->has('check_user') ? ' has-error' : '' }}">
                            <label for="company_name" class="col-md-4 control-label">Status Anda Sebagai</label>

                            <div class="col-md-6">
                                <select id="check_user" name="check_user" class="check-user form-control">
                                    <option value="" disabled hidden selected>Silahkan Pilih</option>
                                    <option value="owner">Owner</option>
                                    <option value="karyawan">Karyawan</option>
                                </select>
                                @if ($errors->has('check_user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('check_user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- Owner Div --}}
                        {{-- <div id="div-owner" class="owner form-group{{ $errors->has('company_name') ? ' has-error' : '' }}" style="display: none">
                            <label for="company_name" class="col-md-4 control-label">Nama Perusahaan anda</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" required>

                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- Karyawan Div --}}
                        {{-- 
                        <div id="div-karyawan" class="owner form-group{{ $errors->has('company_name') ? ' has-error' : '' }}" style="display: none">
                            <label for="corporate_code" class="col-md-4 control-label">Kode Korporasi</label>

                            <div class="col-md-6">
                                <input id="corporate_code" type="text" class="form-control" name="corporate_code" value="{{ old('company_name') }}" required>

                                @if ($errors->has('corporate_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('corporate_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        --}}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Daftar
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <p>Sudah punya akun?<a class="btn btn-link" href="{{ route('login') }}">
                                Login
                            </a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="application/javascript">
        $(document).ready(function () {
            $("select.check-user").change(function () {
                var selected = $(this).children("option:selected").val();

                if (selected == 'owner') {
                    document.getElementById("div-owner").style.display = "";
                    document.getElementById("div-karyawan").style.display = "none";
                } else {
                    document.getElementById("div-owner").style.display = "none";
                    document.getElementById("div-karyawan").style.display = "";
                }
            });
        });
    </script>
@endsection
