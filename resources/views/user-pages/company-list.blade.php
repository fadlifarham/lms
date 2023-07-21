@extends('user-pages/layout')

@section('title', 'Daftar Kelas | LMS')

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="font-size: 10pt;">
			<li class="breadcrumb-item active"><a>Kelas</a></li>
		</ol>
	</nav>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Kelas</h6>
		</div>
		<div class="card-body">
				<!-- Illustrations -->
				{{-- {{ $my_company }} --}}

				<div class="form-group">
				<div class="table-responsive w-100 col-12">
					<a class="btn button-primary font-primary" href="{{ route('create-company') }}"><i class="fas fa-fw fa-plus"></i> Buat Kelas Baru</a>
					<br><br>
					<table class="table table-bordered w-100 col-12">
						<thead>
						<tr>
							<th style="width: 1%">No.</th>
							<th style="width: 20%">Nama Kelas</th>
							{{-- <th style="width: 20%">Kode Training</th> --}}
							<th style="width: 10%">Nama Modul</th> 
							<th style="width: 10%">Detail</th>
						</tr>
						</thead>
						<tbody>
							@if($my_company->count() == 0)
								<tr>
									<td colspan="4" class="text-center">Tidak Ada Kelas</td>
								</tr>
							@else
							    <?php $i = 1 ?>
								@foreach ($my_company as $item)
									{{-- {{ $item }} --}}
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $item->company->name }}</td>
										<td>{{ $item->company->module->name }}</td>
										{{-- <td>{{ $item->company->code }}</td> --}}
										{{-- <td>
												<div class="form-group">
															<form class="form" action="accept" method="POST">
																	{{ csrf_field() }}
																<input type="hidden" name="id" value="{{ $item->id }}"/>
																<button type="submit" name="action" value="terima" class="btn btn-success">Terima</button>
																<button type="submit" name="action" value="tolak" class="btn btn-danger">Tolak</button>
															</form>
												</div>
										</td> --}}
										<td>
											<a 
												style="color:#ffffff;" 
												href="{{route('invite-user-company/', $item->company->id)}}" 
												class="btn button-secondary button-bordered font-secondary">

												Lihat Detail

											</a>
										</td>
									</tr>
									<?php $i++; ?>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div>
@endsection