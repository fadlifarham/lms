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
		<!-- Content Row -->
		<div class="row">	
			<div class="col-lg-12 col-md-2 col-sm-1 mb-4">
				@foreach ($modules as $item)	
				<!-- Illustrations -->
				<div class="card shadow my-3">
					<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Modul</h6>
					</div>
					<div class="card-body">
						<div class="text-center">
							<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="height: 15rem;" src="{{ $item->picture }}" alt="">
						</div>

						{{-- <span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span> --}}

						<strong><p>{{$item->name}}</p></strong>
						<p>
							<input type="hidden" id="original_price" value="{{$item->original_price}}">
							<input type="hidden" id="discount_price" value="{{$item->discount_price}}">
							<input type="hidden" id="module_id" value="{{$item->id}}">
							{{-- <strike>Rp{{ number_format($item->original_price,0, ',' , '.') }}</strike> 
							<span> Rp{{ number_format($item->discount_price,0, ',' , '.') }} </span> --}}
						</p>
						<button 
							type="button" 
							class="buy_now btn button-primary font-primary"
							data-toggle="modal" 
							data-target="#myModal"
							value="{{$item->id}}">

							Pilih Modul
						</button>
						{{-- <span id="info-ticket"><small>Masih terdapat {{ $item->ticket->where('user_id', 0)->count() }} Tiket Gratis lagi</small></span>
						<br>
						<span>
							<small>
									Anda Memiliki {{ $item->ticket->where('ticket_type_id', 1)->where('user_id', \Auth::user()->id)->count() }} Ticket Gratis
									<br>
									Anda Memiliki {{ $item->ticket->whereNotIn('ticket_type_id', [1])->where('user_id', \Auth::user()->id)->count() }} Ticket Berbayar
							</small>
						</span> --}}
					</div>

				</div>
				@endforeach
				{{-- END CARD --}}
			</div>
		</div>


		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header" style="padding:35px 50px;">
						{{-- <strong><p>Beli Sekarang!</p></strong> --}}
						<strong><p>Minta Kuota</p></strong>
					</div>
					<div class="modal-body" style="padding:40px 50px;">
						{{-- <p>Dapatkan tiket sekarang juga! Pilih mode Anda :</p> --}}
						{{-- @if($status == 1)
						<button id="diskon" type="button" class="btn btn-primary mb-1" name="answer" value="Show Div" onclick="showDiv()">Beli dengan harga diskon</button>
						<button id="gratiss" type="button" class="btn btn-secondary" name="answer">Dapatkan gratis</button>
						@else
						<button id="diskon" type="button" class="btn btn-primary" name="answer" value="Show Div" onclick="showDiv()">Beli dengan harga diskon</button>
						@endif --}}
						<button id="diskon" type="button" class="btn button-primary font-primary mb-1" name="answer" value="Show Div" onclick="showDiv()">Minta Kuota</button>
							<br>
						{{-- <div id="welcomeDiv"  style="display:none;" class="answer_list" >
							<br>

							Silahkan lakukan pembayaran sebesar <strong>Rp <span id="total_pay"> 249.000 </span></strong> pada salah satu nomor rekening berikut : <br>
							<br>
							BNI Syariah <br>
							(Kode Rek 009) 0473518784 <br>
							an. Salim Suharis <br>
							<br>
							BCA <br>
							(Kode Rek 014) 788 055 4471 <br>
							an. Alamraya Sebar Barokah <br>
							<br>
							Selanjutnya, Lakukan konfirmasi pembayaran melalui link berikut :
							<br>
							<a id="pay" class="pay btn btn-primary confirm" href="https://wasap.at/9LGc9N">Konfirmasi di sini</a>
							</p>
						</div> --}}

						<div id="welcomeDiv"  style="display:none;" class="answer_list" >
							<br>
							Anda akan meminta kuota training sejumlah <strong><span id="total_ticket_chose"> 1 </span></strong>
							<br>
							<a id="pay" class="pay btn button-primary font-primary" style="color: #ffff;">Konfirmasi di sini</a>
							</p>
						</div>

						{{-- <div id="welcomeDiv"  style="display:none;" class="answer_list" >
							<br>

							Silahkan lakukan pembayaran sebesar <strong>Rp <span id="total_pay"> 249.000 </span></strong> pada salah satu nomor rekening berikut : <br>
							<br>
							BNI Syariah <br>
							(Kode Rek 009) 0473518784 <br>
							an. Salim Suharis <br>
							<br>
							BCA <br>
							(Kode Rek 014) 788 055 4471 <br>
							an. Alamraya Sebar Barokah <br>
							<br>
							Selanjutnya, Lakukan konfirmasi pembayaran melalui link berikut :
							<br>
							<a id="pay" class="pay btn btn-primary" href="https://wasap.at/9LGc9N">Konfirmasi di sini</a>
							</p>
						</div> --}}

						<div id="welcomeDiv"  style="display:none;" class="answer_list" >
							<br>
							{!! nl2br($content['modul']['detail']) !!} <strong><span id="total_ticket_chose"> 1 </span></strong>
							<br>
							<a id="pay" class="pay btn btn-primary">Konfirmasi di sini</a>
							</p>
						</div>

						<div id="choose_ammount"  style="display:none;">
							<select name="total_ticket" id="total_ticket" class="total_ticket form-control">
								<option selected disabled> Jumlah Kuota </option>
								
								{{-- @php $n = 20; @endphp
								@for($i = 1; $i <= $n; $i++)
								<option value="{{ $i }}">{{ $i }}</option>
								@endfor --}}

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

						<div id="gratis"  style="display:none;" class="answer_list" > 
							<p><br>Selamat! Anda telah mendapatkan tiket gratis untuk modul ini.</p>
						</div>
						<div id="maaf"  style="display:none;" class="answer_list" >
							<p><br>Anda sudah mengambil tiket gratis!</p>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
		
		$('.buy_now').click(function() {
			module_id = $(this).val();
		});

// 		$("#gratiss").click(function() {			
// 			// alert("clicked");
// 			$.ajax({
// 				headers: {
// 					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// 				},
// 				type: 'post',
// 				url: APP_URL + '/free_ticket',
// 				data: {
// 					'ticket_id': 1,
// 				},
// 				success: function(data) {			
// 					console.log(data);
// 				},
// 				error: function(e) {
// 					console.log(e);
// 				}
// 			});
// 			document.getElementById('gratiss').style.display = "none";
// 			document.getElementById('gratis').style.display = "block";
// 		});

// 		if (free_ticket_taken == 1) {
// 			document.getElementById('gratiss').style.display = "none";
// 			console.log('hide');
// 		}

		$("#close").click(function() {
			window.location.href = APP_URL + '/modules';
		});

		$('.total_ticket').change(function() {
			total_ticket = $('#total_ticket').val();
			original_price = $('#original_price').val();
			discount_price = $('#discount_price').val();
			// module_id = $('#module_id').val();

			// alert(module_id);

			$('#total_pay').text(discount_price * total_ticket).autoNumeric('init');
			$('#total_ticket_chose').text($('#total_ticket').val());

			document.getElementById('choose_ammount').style.display = "none";
        	document.getElementById('welcomeDiv').style.display = "block";
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
					'total_ticket': total_ticket
				},
				success: function(data) {	
					// Swal.fire({
					// 	position: 'center',
					// 	type: 'success',
					// 	title: 'Permintaan tiket telah terkirim',
					// 	showConfirmButton: false,
					// 	timer: 3000
					// })
					Swal.fire({
						position: 'center',
						type: 'success',
						title: 'Permintaan kuota telah terkirim. Harap menunggu update dari kami.',
						showConfirmButton: false,
						timer: 3000
					}).then(function (result) {
						window.location = APP_URL + '/modules';
					});		
					console.log(data);
				},
				error: function(e) {
					console.log(e);
				}
			});
		});
    });

    function showDiv() {
		document.getElementById('choose_ammount').style.display = "block";
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