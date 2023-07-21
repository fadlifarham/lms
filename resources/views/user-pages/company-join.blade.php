@extends('user-pages/layout')

@section('title', 'Ikut Training | LMS')

@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Bergabung Dengan Kelas</h6>
		</div>
		<div class="card-body">
			
			<form action="{{ route('post-join-company') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label class="label-control">Masukkan Kode Korporasi : </label>
					<br>
					<input class="form-control" type="text" name="code" id="name" style="width: 50%;">
					<br>
					<button class="btn btn-success">Gabung</button>
				</div>	
			</form>

		</div>
	</div>
</div>
@endsection