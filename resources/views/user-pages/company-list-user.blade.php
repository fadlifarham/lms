@extends('user-pages/layout')

@section('title', 'Daftar Anggota | LMS')

@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Pengguna Yang Mengklaim Kode Kelas Anda</h6>
		</div>
		{{-- {{ $my_user[0]->company_id }} --}}
		<div class="card-body">
				<div class="form-group">

					<div class="form-group">
						<form action="{{ route('post-data-user') }}" method="POST">
							{{ csrf_field() }}
							<label class="control-label">Pilih Kelas Anda : </label>
							<select name="company" class="form-control" onchange="this.form.submit()" style="width: 30%;">
								<option selected disabled> Pilih Disini </option>
								@foreach($my_company as $item)
								<option value="{{ $item->company_id }}">{{ $item->company->name }}</option>
								@endforeach
							</select>
						</form>
					</div>
				</div>

				@if($my_user->count() != 0)
				<input hidden id="company" value="{{$my_user[0]->company_id}}" />
				<div class="form-group">
					<button id="sendtoall" class="btn btn-primary float-right">Kirim Ke Semua</button>
					<br><br>
				</div>
				@endif
				
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
							@if($my_user->count() == 0)
								<tr>
									<td colspan="3" class="text-center">Tidak Ada Permintaan</td>
								</tr>
							@else
								@php $i = 1; @endphp
								@foreach ($my_user as $item)
									{{-- {{ $item }} --}}
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $item->user->name }}</td>
										<td>
												
												<div class="form-group">
													@if($item->acceptance_status == 0)
													<form class="form" action="accept" method="POST">
															{{ csrf_field() }}
														<input type="hidden" name="id" value="{{ $item->id }}"/>
														<button type="submit" name="action" value="terima" class="btn btn-success">Terima</button>
														<button type="submit" name="action" value="tolak" class="btn btn-danger">Tolak</button>
													</form>
													@else
													<button name="action" id="send" value="{{ $item->user->email }}" class="send btn btn-info">Kirim Tiket</button>
													@endif
												</div>
										</td>
										@php $i++; @endphp
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
		</div>
	</div>

	{{-- MODALS --}}
	<div class="modal fade-scale" id="myModal" role="dialog">
			<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
							<div class="modal-header" >
									<strong><p>Kirim Tiket</p></strong>
							</div>
							<div class="modal-body" >
									{{-- <div class="form-group">
											<iframe width="470" height="315" frameborder="0" allowfullscreen
											src="{{ $overview->link }}">
											</iframe>
									</div> --}}
									<div class="form-group">
											<h3 class="text-center">Pilih Tiket</h3>
									</div>
									<div class="form-group text-center">
											{{-- <form action="send" method="POST"> --}}
												{{ csrf_field() }}
												{{-- <label class="control-label">Pilih Tiket Yang Ingin Dikirmkan</label> --}}
												{{-- <input name="email" value="{{  }}" hidden> --}}
												<select name="company" id="ticket" class="form-control">
													<option selected disabled> Pilih Disini </option>
													@foreach($my_ticket as $item)
													<option value="{{ $item->id }}">{{ $item->module->name }}</option>
													@endforeach
												</select>
												<br>
												<button id="send_to_user" class="btn btn-success">Kirim</button>
											{{-- </form> --}}
									</div>
							</div>
							<div class="modal-footer">
									<button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
					</div>
			</div>
	</div>
	{{-- END MODALS --}}

	{{-- MODALS SEND TO ALL --}}
	<div class="modal fade-scale" id="sendtoallModal" role="dialog">
		<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
						<div class="modal-header" >
								<strong><p>Kirim Tiket</p></strong>
						</div>
						<div class="modal-body" >
								{{-- <div class="form-group">
										<iframe width="470" height="315" frameborder="0" allowfullscreen
										src="{{ $overview->link }}">
										</iframe>
								</div> --}}
								<div class="form-group">
										<h3 class="text-center">Pilih Module</h3>
								</div>
								<div class="form-group text-center">
										{{-- <form action="send" method="POST"> --}}
											{{ csrf_field() }}
											{{-- <label class="control-label">Pilih Tiket Yang Ingin Dikirmkan</label> --}}
											{{-- <input name="email" value="{{  }}" hidden> --}}
											<select name="module" id="module" class="form-control">
												<option selected disabled> Pilih Disini </option>
												@foreach($my_ticket->unique('module') as $item)
												<option value="{{ $item->module->id }}">{{ $item->module->name }}</option>
												@endforeach
											</select>
											<br>
											<button id="send_to_all" class="btn btn-success">Kirim</button>
										{{-- </form> --}}
								</div>
						</div>
						<div class="modal-footer">
								<button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
		</div>
	</div>
	{{-- END MODALS SEND TO ALL --}}

</div>

<script>
	$(document).ready(function() {
		var email, ticket, modul, company;

		$('.send').click(function() {
			email = $(this).val();
			$('#myModal').modal('show');
		});

		$('#send_to_user').click(function() {
			ticket = $('#ticket').val();

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'post',
				url: APP_URL + '/send',
				data: {
					'email': email,
					'ticket' : ticket,
				},
				success: function(data) {
					console.log(data);
					window.location.href = APP_URL + '/list-user-company';
				},
				error: function(e) {
					console.log(e);
				}
			});

		});

		$('#sendtoall').click(function() {
			$('#sendtoallModal').modal('show');
		});

		$('#send_to_all').click(function() {
			modul = $('#module').val();
			company = $('#company').val();
			
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'post',
				url: APP_URL + '/send-all',
				data: {
					'module': modul,
					'company': company,
				},
				success: function(data) {
					console.log(data);
					window.location.href = APP_URL + '/list-user-company';
				},
				error: function(e) {
					console.log(e);
				}
			});

		});

	});
</script>
@endsection