@extends('user-pages/layout')

@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Pengguna Yang Mengklaim Kode Korporasi Anda</h6>
		</div>
		<div class="card-body">
				<!-- Illustrations -->
				<div class="table-responsive w-100 col-12">
					<table class="table table-bordered w-100 col-12">
						<thead>
						<tr>
							<th style="width: 1%">ID</th>
							<th>Name</th>
							<th style="width: 20%">Aksi</th>
						</tr>
						</thead>
						<tbody>
							@if($users->count() == 0)
								<tr>
                  <td colspan="3" class="text-center">Tidak Ada Permintaan</td>
                </tr>
							@else
								@foreach ($users as $item)
									<tr>
										<td>{{ $item->id }}</td>
										<td>{{ $item->name }}</td>
										<td>
												<div class="form-group">
															<form class="form" action="accept" method="POST">
																	{{ csrf_field() }}
																<input type="hidden" name="id" value="{{ $item->id }}"/>
																<button type="submit" name="action" value="terima" class="btn btn-success">Terima</button>
																<button type="submit" name="action" value="tolak" class="btn btn-danger">Tolak</button>
															</form>
												</div>
										</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div>
@endsection