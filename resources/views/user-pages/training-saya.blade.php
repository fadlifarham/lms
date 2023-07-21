@extends('user-pages/layout')

@section('title', 'Kelas Saya | LMS')

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

	#no-class {
		width: 40%;
		height: 50%;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}

	.mycard {
		width: 300px;
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
	
	.nama-modul {
	    height: 40px;
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

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="font-size: 10pt;">
			<li class="breadcrumb-item active"><a>Kelas Saya</a></li>
		</ol>
	</nav>
    <div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Daftar Kelas Saya</h6>
		</div>
    </div>
    @if($tickets->count() == 0)
        <img id="no-class" src="https://assets-ouch.icons8.com/preview/498/19278d54-10a9-452b-a1d5-6eec2186d17f.png" alt="">
        <div class="text-center">
            <h3>Anda Tidak Memiliki Kelas </h3>
        </div>
	@else
	<div class="row">
			@foreach ($tickets as $item)
			@if($item->progress_in_module > 0)
				<div class="col-md-4">
				<div class="card mb-4 mycard">
					<img class="card-img-top cardimage" src="{{$item->module->picture}}" alt="Card image cap">
					<div class="card-body">
						<h6 class="card-title nama-modul">{{$item->module->name}} - {{$item->ticket_type->name}}</h6>
						{{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
						<a id="progress" href={{route('section', ['id' => $item->id])}} class="progresss btn button-primary font-primary stretched-link" style="width: 100%">
							Lihat Progress
						</a>
					</div>
				</div>
				</div>
			@endif
			@endforeach
	</div>
    @endif
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
						window.location.href = APP_URL + '/section/' + id_ticket;			
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