@extends('user-pages/layout')

@section('title', 'Modul | LMS')

@section('css')
<style>
	.button {
		font-size: 1em;
		padding: 10px;
		color: #fff;
		border: 2px solid #06D85F;
		border-radius: 20px/50px;
		text-decoration: none;
		cursor: pointer;
		transition: all 0.3s ease-out;
	}
	.button:hover {
		background: #06D85F;
	}
	
	.nama-modul {
		height: 40px;
	}
	
	.overlay {
		position: fixed;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		background: rgba(0, 0, 0, 0.7);
		transition: opacity 500ms;
		visibility: hidden;
		opacity: 0;
	}
	.overlay:target {
		visibility: visible;
		opacity: 1;
	}

	.mycard {
		width: 350px;
	}
	
	.popup {
		margin: 70px auto;
		padding: 20px;
		background: #fff;
		border-radius: 5px;
		width: 30%;
		position: relative;
		transition: all 5s ease-in-out;
	}
	
	.popup h2 {
		margin-top: 0;
		color: #333;
		font-family: Tahoma, Arial, sans-serif;
	}
	.popup .close {
		position: absolute;
		top: 20px;
		right: 30px;
		transition: all 200ms;
		font-size: 30px;
		font-weight: bold;
		text-decoration: none;
		color: #333;
	}
	.popup .close:hover {
		color: #06D85F;
	}
	.popup .content {
		max-height: 30%;
		overflow: auto;
	}

	.row {
   display: flex;
   flex-wrap: wrap;
	}

	.row > div[class*='col-'] {
		display: flex;
	}

	.card-img-top {
		height: 12rem;
		width: auto;
	}

	.content-card-modul {
		width: 100%;
		height: 60%;
	}

	
	@media screen and (max-width: 700px){
		.box{
			width: 70%;
		}
		.popup{
			width: 70%;
		}
	}
		</style>
@endsection

@section('content')
	<div class="container-fluid">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="font-size: 10pt;">
				<li class="breadcrumb-item active"><a>Modul</a></li>
			</ol>
		</nav>
		@foreach($kategori as $kategori)
		@if($kategori->module->count() != 0)
		<div class="card shadow mb-4">
				<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">{{ $kategori->category }}</h6>
				</div>
			</div>
			<!-- Content Row -->
			<div class="row">
					@foreach ($kategori->module as $item)
							<div class="col-md-3">
							<div class="card mb-3 mycard">
								<img class="card-img-top" src="{{$item->picture}}" alt="Card image cap">
								<div class="card-body">
									<h6 class="card-title nama-modul" style="text-align: center;">{{$item->name}}</h6>
									<p>
										<input type="hidden" id="original_price" value="{{$item->original_price}}">
										<input type="hidden" id="discount_price" value="{{$item->discount_price}}">
										<input type="hidden" id="module_id" value="{{$item->id}}">
										{{-- <strike>Rp{{ number_format($item->original_price,0, ',' , '.') }}</strike> 
										<span> Rp{{ number_format($item->discount_price,0, ',' , '.') }} </span> --}}
									</p>
									{{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
									<button 
										type="button" 
										class="buy_now btn button-primary font-primary"
										data-toggle="modal" 
										data-target="#myModal"
										style="width: 100%;"
										value="{{$item->id}}">
		
										Minta Kuota Kelas
								</div>
							</div>
							</div>
					@endforeach
			</div>
		@endif
		@endforeach
		


		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="padding:35px 50px;">
						<strong><p>Minta Kuota</p></strong>
					</div>
					<div class="modal-body" style="padding:40px 50px;">

						<p>Modul Yang Anda Pilih : <span id="nama_modul"></span></p>

						<div id="choose_jenis">
							<select name="pilih_jenis_ticket" id="pilih_jenis_ticket" class="pilih_jenis_ticket form-control">
								<option selected disabled> Jenis Tiket </option>
								@php 
									$n = 30;
									$jenis = array('Rookie', 'Intermediate', 'Advance', 'Expert');
								@endphp
								@for($i = 0; $i < count($jenis); $i++)
									<option value="{{ $i+1 }}">{{ $jenis[$i] }}</option>
								@endfor

							</select>
						</div>

						<br>

						<div id="choose_ammount">
							<select name="total_ticket" id="total_ticket" class="total_ticket form-control">
								<option selected disabled> Jumlah Kuota </option>

								@php $n = 30; @endphp
								@for($i = 0; $i <= $n; $i+=5)
									@if($i == 0)
										<option value="{{ $i+1 }}">{{ $i+1 }}</option>
									@else
										<option value="{{ $i }}">{{ $i }}</option>
									@endif
								
								@endfor

							</select>
						</div>

						<br>

						<div id="welcomeDiv" class="answer_list" >
							{{-- <br>
							{!! nl2br($content['modul']['detail']) !!} <strong><span id="total_ticket_chose"> 1 </span></strong>
							<br> --}}
							<a id="pay" class="pay btn btn-primary" style="color: white;">Konfirmasi di sini</a>
							</p>
						</div>

					</div>
					<div class="modal-footer">
						<button id="close" type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
				</div>

				<div id="welcomeDiv"  style="display:none;" class="answer_list" > WELCOME</div>

			</div>
		</div>


	</div>

<script>
    $( document ).ready(function() {
		var free_ticket_taken = @php echo $free_ticket_taken; @endphp;
		var total_ticket, original_price, discount_price, module_id;
		var jenis_ticket;
		
		$('.buy_now').click(function() {
			module_id = $(this).val();
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				url: APP_URL + '/ajax-get-module-name',
				data: {
					'module_id': module_id
				},
				success: function(data) {
					$("#nama_modul").text(data.name);
				},
				error: function(e) {
					console.log(e);
				}
			});
		});

		$("#close").click(function() {
			location.reload();
		});

		$('.pilih_jenis_ticket').change(function() {
			jenis_ticket = $(this).val();
		});

		$('.total_ticket').change(function() {
			total_ticket = $('#total_ticket').val();
			original_price = $('#original_price').val();
			discount_price = $('#discount_price').val();

			$('#total_pay').text(discount_price * total_ticket).autoNumeric('init');
			$('#total_ticket_chose').text($('#total_ticket').val());
		});

		$('.pay').click(function() {
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'post',
				url: APP_URL + '/purchase',
				data: {
					'module_id': module_id,
					'total_ticket': total_ticket,
					'jenis_ticket': jenis_ticket
				},
				success: function(data) {

					if (data.code == 400) {
						Swal.fire({
						position: 'center',
						type: 'warning',
						title: data.message,
						showConfirmButton: false,
						timer: 3000
						}).then(function (result) {
							location.reload();
						});
					} else if (data.code == 200) {
						Swal.fire({
						position: 'center',
						type: 'success',
						title: 'Permintaan kuota telah terkirim. Harap menunggu update dari kami.',
						showConfirmButton: false,
						timer: 3000
						}).then(function (result) {
							location.reload();
						});
					}
					
				},
				error: function(e) {
					console.log(e);
				}
			});
		});
    });

    function showDiv() {
		// document.getElementById('choose_ammount').style.display = "block";
		document.getElementById('choose_jenis').style.display = "block";
		document.getElementById('diskon').style.display = "none";
    //     document.getElementById('welcomeDiv').style.display = "block";
    //    document.getElementById('gratis').style.display = "none";
	// 		 document.getElementById('maaf').style.display = "none";
    }

	function showBill() {
		total_ticket = $('#total_ticket').val();
		document.getElementById('choose_ammount').style.display = "none";
        document.getElementById('welcomeDiv').style.display = "block";
       document.getElementById('gratis').style.display = "none";
			 document.getElementById('maaf').style.display = "none";
	}

	document.querySelector(".confirm").addEventListener('click', function(){
			swal("Our First Alert", "With some body text and success icon!", "success");
	});
  </script>

@endsection