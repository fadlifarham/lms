@extends('user-pages/layout')

@section('title', 'Tambah Anggota Kelas | LMS')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="font-size: 10pt;">
			<li class="breadcrumb-item"><a href="{{ route('list-company') }}">Kelas</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ $company->name }}</li>
		</ol>
	</nav>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tambah Anggota Kelas Anda</h6>
		</div>
		<div class="card-body">

                <form action="{{ route('invite-user-company') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
						<label class="label-control">Masukkan email anggota yang ingin ditambahkan: </label>
						<input type="hidden" name="company_id" value="{{ $id }}">
						<input class="form-control" type="text" name="email" id="email" style="width: 50%;">
						@if($errors->has('email'))
						<span style="color: red;" class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
                        <br>
						@if($tickets->isEmpty())
							<span style="color: red;" class="help-block">
								<strong>Anda tidak memiliki tiket</strong>
							</span>
							<br>
                            <button class="btn btn-secondary" disabled>Tambah</button>
						@else
							<span style="color: green;" class="help-block">
								<strong>Jumlah kuota yang tersisa : {{ $tickets->count() }} tiket</strong>
							</span>
							<br>
                            <button class="btn button-primary font-primary">Tambah</button>
						@endif
                    </div>	
			    </form>
				<div class="form-group">
				<div class="table-responsive w-100 col-12">
					<table class="table table-bordered w-100 col-12">
						<thead>
						<tr>
							<th style="width: 1%">No.</th>
							<th style="width: 20%">Nama Anggota</th>
							{{-- <th style="width: 20%">Kirim Tiket</th> --}}
						</tr>
						</thead>
						<tbody>
							@php $i = 1; @endphp
							@foreach($users as $item)
							<tr>
								<td>{{ $i }}</td>
								<td>{{ $item->name }}</td>
								@php $i++; @endphp
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div>
@endsection