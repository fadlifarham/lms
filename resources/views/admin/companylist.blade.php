@extends('user-pages/layout')

@section('css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="font-size: 10pt;">
		  <li class="breadcrumb-item active"><a>Kelas</a></li>
		</ol>
	</nav>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Daftar Kelas</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
						<tr>
							<th>No</th>
							<th>Nama Kelas</th>
							<th>Tanggal</th>
							<th>Daftar Peserta</th>
							<th>Nilai Ujian</th>
						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
                        @foreach($company as $company)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $company->name }}</td>
								<td>{{ $company->created_at->format('Y-m-d') }}</td>
								<td><center><a href="{{ url('admin/companylist/daftar-peserta/' . $company->id) }}"><i class="fas fa-eye fa-2x"></i></a></center></td>
								<td>
									<a data-toggle="tooltip" data-placement="bottom" title="Latihan" href="{{ url('admin/grafik-nilai/1/'.$company->id) }}" class="btn btn-danger">
										<i class="far fa-file-alt"></i>
									</a>
									<a href="{{ url('admin/grafik-nilai/2/'.$company->id) }}" data-toggle="tooltip" data-placement="bottom" title="Sertifikasi" class="btn btn-success">
										<i class="far fa-file-alt"></i>
									</a>
									<a href="{{ url('admin/grafik-nilai/3/'.$company->id) }}" data-toggle="tooltip" data-placement="bottom" title="Sertifikasi Higher-Order Thinking" class="btn btn-primary">
										<i class="far fa-file-alt"></i>
									</a>
								</td>
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

@section('javascript')
<script>
	$(document).ready(function(){
	//   $('[data-toggle="tooltip"]').tooltip();
	$(".btn").tooltip({ selector:  '[data-toggle="tooltip"]' });
	});
</script>
@endsection