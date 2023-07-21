@extends('user-pages/layout')

@section('title', 'Buat Kelas | LMS')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="font-size: 10pt;">
			<li class="breadcrumb-item"><a href="{{ route('list-company') }}">Kelas</a></li>
			<li class="breadcrumb-item active" aria-current="page">Buat Kelas</li>
		</ol>
	</nav>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Buat Kelas Anda</h6>
		</div>
		<div class="card-body">	
			<form action="{{ route('post-create-company') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">

					<label>Nama Kelas : </label>
					<span>
						<input class="form-control" type="text" placeholder="Nama Kelas" name="name" id="name" style="width: 50%;">
					</span>
					<div style="margin-top: 10px; padding-left: 10px;">
						<span style="color: grey; font-size:15px;" class="help-block">
							Format: [Jenis Training] [Materi] [Peserta] - [Lokasi]
						</span>
					</div>
					<br>

					<label class="control-label">Pilih Modul Anda : </label>
					<select name="module" class="moduleSelect form-control" style="width: 30%;">
						<option selected disabled> Pilih Disini </option>
						@foreach($modul as $modul)
							<option value="{{ $modul->id }}">{{ $modul->name }}</option>
						@endforeach
					</select>
					<br>

					<label class="control-label">Pilih Jenis Kelas Anda : </label>
					<select name="jenis" class="jenisSelect form-control" style="width: 30%;">
						<option selected disabled> Pilih Disini </option>
						<option value="1">Rookie</option>
						<option value="2">Intermediate</option>
						<option value="3">Advance</option>
						<option value="4">Expert</option>
					</select>
					<br>

					<button class="createBtn btn button-primary font-primary create-training" disabled><i class="fas fa-fw fa-plus"></i> Simpan</button>
				</div>	
			</form>
		</div>
	</div>
</div>
@endsection

<script>
	document.querySelector(".create-training").addEventListener('click', function(){
  swal("Our First Alert", "With some body text and success icon!", "success");
});
</script>

@section('javascript')
<script>
	$(document).ready(function() {
		var jenis, modul;

		$(".moduleSelect").change(function() {
			modul = $(this).val();
		});

		$(".jenisSelect").change(function() {
			jenis = $(this).val();

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				url: APP_URL + '/verify-class',
				data: {
					'module': modul,
					'jenis': jenis
				},
				success: function(data) {
					if (data.jumlah == 0) {
						$(".createBtn").attr("disabled", true);
					} else {
						$(".createBtn").attr("disabled", false);
					}
				},
				error: function(e) {
					console.log(e);
				}
			});
		});
	});
</script>
@endsection