@extends('user-pages/layout')

@section('title', 'Tiket | LMS')

@section('css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="font-size: 10pt;">
			<li class="breadcrumb-item active"><a>Tiket</a></li>
		</ol>
	</nav>
	{{-- {{ $tickets[0] }} --}}
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tiket</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th style="width: 1%;">No.</th>
							<th>Nama Tiket</th>
							<th>Jenis</th>
							<th>Jumlah</th>
							<th style="width: 20%;">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@if($tickets->count() == 0)
							<tr>
								<td colspan="6" class="text-center">Tidak Ada Tiket</td>
							</tr>
						@else
							<?php $i = 1; ?>
							@foreach($tickets as $item)
							<tr>
								<td>{{$i}}</td>
								<td>{{$item->module->name}}</td>
								{{-- <td>{{$count_tickets[$i-1]}}</td> --}}
								<td>{{ $item->ticket_type->name }}</td>
								<th>{{ $item->jumlah }}</th>
								<td>
									@if($item->progress_in_module == 0)
									<button 
										id="activate"
										value="{{ $item->id }}"
										class="activate btn button-secondary font-secondary"
										@if(strtotime(date('Y-m-d')) < strtotime($item->start_date) || strtotime(date('Y-m-d')) > strtotime($item->end_date) )
											@if($item->start_date != NULL)
											hidden
											@endif
                                    	@endif>

										Aktifkan

									</button>
									@else
									<button 
										id="progress"
										value="{{ $item->id }}"
										class="progresss btn button-primary font-primary">

										Lihat Progress

									</button>
									@endif
								</td>
								<?php $i++; ?>
							</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
				
			{{-- Modal --}}
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header" style="padding:35px 50px;">
							<strong><p>Kirim Tiket Kepada</p></strong>
						</div>
						<div class="modal-body" style="padding:40px 50px;">
							{{-- <form action="/send"> --}}
								<div class="form-group">
									<label for="">Masukkan Email Pengguna</label>
									<input id="destination" name="destination" class="form-control" />
									<br>
									<button id="kirim_ticket" class="form-control btn btn-success">
										Kirim
									</button>
								</div>
							{{-- </form> --}}
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
					
					<div id="welcomeDiv"  style="display:none;" class="answer_list" > WELCOME</div>
				</div>
			</div>

		</div>
	</div>

</div>

	{{-- <script>
		// Get the modal
		var modal = document.getElementById("myModal");

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal
		btn.onclick = function() {
			modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script> --}}
	<script>
		$(document).ready(function() {
			var id_ticket;

			$('#send').click(function() {
				id_ticket = $(this).val();
			});

			$('.activate').click(function() {
				id_ticket = $(this).val();
					
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'get',
					url: APP_URL + '/activate/' + id_ticket,
					success: function(data) {
						Swal.fire({
						position: 'center',
						type: 'success',
						title: 'Modul Berhasil Diaktifkan',
						showConfirmButton: false,
						timer: 3000
						}).then(function (result) {
							window.location = APP_URL + '/section/' + id_ticket;
						});		
						// console.log(data);
					},
					error: function(e) {
						console.log(e);
					}
				});

			});

			$('.progresss').click(function() {
				id_ticket = $(this).val();
				window.location.href = APP_URL + '/section/' + id_ticket;
			});

			$('#kirim_ticket').click(function() {
				var destination = $('#destination').val();
				// alert(destination + " " + id);
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'post',
					url: APP_URL + '/send',
					data: {
						'id': id_ticket,
						'destination': destination
					},
					success: function(data) {
						window.location.href = APP_URL + '/ticket';
					},
					error: function(e) {
						alert(e);
					}
				});
			});
		});
	</script>
@endsection