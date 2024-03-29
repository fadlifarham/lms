<?php
  use App\Http\Controllers\HelperController;
?>

@extends('user-pages/layout')

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<link rel="stylesheet" href="{{ url('jquery-steps/css/normalize.css') }}">
<link rel="stylesheet" href="{{ url('jquery-steps/css/main.css') }}">
<link rel="stylesheet" href="{{ url('jquery-steps/css/jquery.steps.css') }}">

@section('title', 'Latihan | LMS')

@section('css')
<style>
  h1, h2, h3, h4, h5, h6, p, button {
    font-family: "Montserrat", sans-serif;
  }

  .icon {
    float: left;
    vertical-align: middle;
  }

  .option {
    float: initial;
  }

  .choose-btn {
    background-color: #ffffff;
    color: black;
    width: 100%;
    padding: 15px 0px 15px 50px;
    font-size: 16px;
    font-family: "Montserrat", sans-serif;
    border: none;
    cursor: pointer;
    text-align: left;
    margin: 0;
    border-radius: 8pt;
  }
  
  /* .choose-btn:hover{
    background-color:  #ffd11a;
    color: black;
  } */

  .question-card{
    margin: 50px 120px 150px 120px;
  }

  .question{
    font-size: 18pt;
  }
  
  /* .choose-btn:focus{
    background-color:  #ffe066;
    color: black;
  } */

  .left-score{
    width: 50%; 
    float: left; 
    height: 90%; 
    border-right: 5px solid white; 
    padding: 20px 30px 30px 60px;
  }

  .right-score{
    width: 50%; 
    float: left; 
    height: 100%; 
    padding: 10px 30px 30px 60px;
  }

  #total{
    font-size: 60pt;
    /* margin-left: 80px; */
    /* margin-top: 80px; */
  }

  .problem_picture {
    max-height: 420px;
    /* width: 100%; */
    max-width: 690px;
  }

  #result{
    background-color: #2f4c7a;
    color: white;
    padding: 30px 50px;
    height: 400px;
  }

  .pdbtn{
    padding: 10px;
    font: 48px;
  }

  #timer{
    background-color: #2f4c7a;
    padding: 10px;
    color: white;
    display: block;
    font: 22px monospace;
  }

  /* The container */
.container-checkbox {
  background-color: #ffffff;
  padding: 15px;
  width: 100%;
  border-radius: 8pt;

  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 19px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container-checkbox input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 15px;
  left: 15px;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container-checkbox:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-checkbox input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container-checkbox input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container-checkbox .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

.problem_picture {
    border-radius: 5px;
    cursor: zoom-in;
    transition: 0.3s;
  }

.problem_picture:hover {
    opacity: 0.7;
  }

  /* The Modal (background) */
.modal-image {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-image-content {
  margin: auto;
  display: block;
  border: 5px solid white;
  width: 80%;
  /* max-width: 1000px; */
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-image-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close-image {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
  /* background-color: #181819; */
}

.close-image:hover,
.close-image:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 1000px){
  .modal-image-content {
    width: 100%;
  }
}

#custom_steps_button {
  margin-top: -5px;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4 question-card" id="scroll">

        <div class="card-header py-3">
            <h6 id="counter_question" style="font-size: 12pt;" class="m-0 font-weight-bold text-center">Soal <span id="current_pos">1</span> / {{ $hot_question->count() }}</h6>
            
            <div id="custom_steps_button" class="float-right">
              <br><br>
              <button disabled type="button" id="reportConfigStepsPrev" class="btn btn-sm btn-primary pdbtn">
                Kembali
              </button>
              
              <button type="button" id="reportConfigStepsNext" class="btn btn-sm btn-primary pdbtn">
                {{-- <i class="fa fa-chevron-right"></i> --}}
                Selanjutnya
              </button>
              
              &nbsp;&nbsp;&nbsp;

              <button type="button" id="reportConfigStepsFinish" class="btn btn-sm btn-success pdbtn">
                {{-- <i class="fa fa-save"></i> --}}
                Selesai
              </button>
            </div>

            <div id="timer_section" class="float-left">
              <b><p>Waktu Tersisa :</p><p class="btn btn-primary" id="timer"></p></b>
            </div>
        </div>

        <div class="card-body" style="background-color: #2f4c7a; padding-top: 5px;">
            <div id="result" style="display: none;">
              <div class="left-score">
                <h2>Nama</h2>
                <p>{{ Auth::user()->name }}</p>
                <h2>Tanggal</h2>
                <p id="date"></p><br>
                <button id="back" class="btn btn-light">Kembali ke Beranda</button>
              </div>
             
             <div class="right-score">
              <h2>
                Nilai Anda 
              </h2>
              <p><b><span id="total"></span></b></p>
             </div>
            </div>

            <div id="wizard"  style="margin-top: 25px; padding-top: 5px;">
              
                @foreach($hot_question as $item)
                <h3 style="font-size: 20pt;"></h3>
                <section>
                  @if($item->picture != NULL)
                  <div class="text-center div-problem" style="white-space: pre-wrap;">
                    <img class="problem_picture" alt="." src="{{ $item->picture }}">
                    
                  </div>
                  @endif
                  <p style="font-size: 14pt;">
                    {{ $item->problem }}
                  </p>

                  <label class="container-checkbox">
                    &nbsp; &nbsp;
                    {{ $item->option_a }}
                    <input type="checkbox" class="choose" value="0">
                    <span class="checkmark"></span>
                  </label> <br>
                  
                  <label class="container-checkbox">
                    &nbsp; &nbsp;
                    {{ $item->option_b }}
                    <input type="checkbox" class="choose" value="1">
                    <span class="checkmark"></span>
                  </label> <br>

                  <label class="container-checkbox">
                    &nbsp; &nbsp;
                    {{ $item->option_c }}
                    <input type="checkbox" class="choose" value="2">
                    <span class="checkmark"></span>
                  </label> <br>

                  <label class="container-checkbox">
                    &nbsp; &nbsp;
                    {{ $item->option_d }}
                    <input type="checkbox" class="choose" value="3">
                    <span class="checkmark"></span>
                  </label> <br>
                  
                  <label class="container-checkbox">
                    &nbsp; &nbsp;
                    {{ $item->option_e }}
                    <input type="checkbox" class="choose" value="4">
                    <span class="checkmark"></span>
                  </label> <br>

                </section>
                @endforeach

            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal-image">
  <span class="close-image">&times;</span>
  <img class="modal-image-content" id="img01">
  <div id="caption"></div>
</div>
@endsection

@section('javascript')

<script src="{{ url('jquery-steps/js/modernizr-2.6.2.min.js') }}"></script>
<script src="{{ url('jquery-steps/js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ url('jquery-steps/js/jquery.cookie-1.3.1.js') }}"></script>
<script src="{{ url('jquery-steps/js/jquery.steps.js') }}"></script>
{{-- <script src="{{ url('jquery-steps/js/jquery.steps.fix.js') }}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
      var id_ticket = @php echo $ticket->id; @endphp;
      var sum_of_question = @php echo $hot_question->count(); @endphp;

      $("#result").hide();

      $('html, body').animate({
        scrollTop: $('#scroll').offset().top
      }, 'slow');

      var selected_color = "#ffffff";
      var unselected_color = "#ffd11a";
      var color;
      var merge_split_answer;
      var hexDigits = new Array
        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");

      var indexStep = 0;
      var now_answer = new Array();
      var list_answer = @php echo json_encode($list_answer) @endphp;
      var list_answer_user = new Array(list_answer.length).fill("UUUUU");
      var date;
      var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
			
      var tanggal = new Date().getDate();
      var xhari = new Date().getDay();
      var xbulan = new Date().getMonth();
      var xtahun = new Date().getYear();

      var hari = hari[xhari];
      var bulan = bulan[xbulan];
      var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;

      var end = new Date();
      end.setHours(end.getHours() + {{ HelperController::waktuHighOrderThinking()[0] }});
      end.setMinutes(end.getMinutes() + {{ HelperController::waktuHighOrderThinking()[1] }});
      // end.setMinutes(end.getMinutes() + 1);
      end = end.getTime();

      var time = setInterval(function() {
        var now = new Date().getTime();
        var distance = end - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        hours = ("0" + hours).slice(-2);
        
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        minutes= ("0" + minutes).slice(-2);
        
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        seconds = ("0" + seconds).slice(-2);

        document.getElementById("timer").innerHTML = hours + " : " + minutes + " : " + seconds + " ";

        if (distance <= 0) {
          clearInterval(time);
          submit(id_ticket, list_answer, list_answer_user);
        }

      }, 1000);

      $("#reportConfigStepsPrev").click(function() {
        $("#wizard").steps('previous');
      });

      $("#reportConfigStepsNext").click(function() {
        $("#wizard").steps('next');
      });

      $("#reportConfigStepsFinish").click(function() {
        $("#wizard").steps('finish');
      });

			$("#wizard").steps({
				headerTag: "h3",
				bodyTag: "section",
        transitionEffect: "slide",
        enablePagination: false,
        labels: {
          next: "Selanjutnya",
          previous: "Kembali",
          finish: "Selesai"
        },

        onStepChanging: function(event, currentIndex, newIndex) {
          if (newIndex == 0) {
            $("#reportConfigStepsPrev").attr("disabled", true);
            $("#reportConfigStepsNext").attr("disabled", false);
          } else if (newIndex == sum_of_question - 1) {
            $("#reportConfigStepsPrev").attr("disabled", false);
            $("#reportConfigStepsNext").attr("disabled", true);
          } else {
            $("#reportConfigStepsPrev").attr("disabled", false);
            $("#reportConfigStepsNext").attr("disabled", false);
          }

          if (list_answer_user[currentIndex] == "UUUUU") {
            $("#wizard-t-" + currentIndex).css("background", "#FFFFFF");
          } else {
            $("#wizard-t-" + currentIndex).css("background", "#53D2FC");
          }

          $("#wizard-t-" + newIndex).css("background", "#2284BE");

          return true;
        },

				onStepChanged: function(event, currentIndex, priorIndex) {
          // resizeJquerySteps();

          indexStep = currentIndex;
          $('#current_pos').text(currentIndex+1);

          if (currentIndex == ($(".steps li").length - 1)) {

          }
				},
        onFinished: function(event, currentIndex) {
          Swal.fire({
            title: 'Anda Yakin?',
            text: "Anda tidak diizinkan untuk mengulangi lagi",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya'
          }).then((result) => {
            if (result.value) {
              submit(id_ticket, list_answer, list_answer_user);
            }
          });
        }
			});

      $(".choose").click(function() {
        var idx_value = $(this).val();
        var char_answer;
        var split_answer = list_answer_user[indexStep].split('');
        
        if (split_answer[idx_value] == 'C') {
          char_answer = 'U';
        } else {
          char_answer = 'C';
        }

        split_answer[idx_value] = char_answer;
        
        merge_split_answer = "";
        
        split_answer.forEach(element => {
          merge_split_answer = merge_split_answer + element;
        });

        list_answer_user[indexStep] = merge_split_answer;
        
        // console.log(list_answer_user);
      });

      $("#back").click(function() {
        location.href = APP_URL + '/training-saya';
      });

      function submit(id_ticket, list_answer, list_answer_user) {
        $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'post',
          url: APP_URL + '/high-order-thinking',
          data: {
            'ticket_id': id_ticket,
            'list_answer': list_answer,
            'list_answer_user': list_answer_user
          },
          success: function(data) {
            $('#total').text(data.data.total);
            // $('#correct').text(data.data.correct);
            // $('#wrong').text(data.data.wrong);
            // $('#not_answered').text(data.data.not_answered);
            date = new Date(data.data.created_at); 
            $('#date').text(hari +', ' + tanggal + ' ' + bulan + ' ' + tahun);

            $("#counter_question").hide();
            $("#wizard").hide();

            $("#custom_steps_button").hide();
            $("#timer_section").hide();

            $("#result").show();
          },
          error: function(e) {
              console.log(e);
          }
        });
      }

      // function rgb2hex(rgb) {
      //   rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
      //   return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
      // }

      // function hex(x) {
      //   return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
      // }

      $('.problem_picture').click(function(event) {
        event.preventDefault();

        var modalImg = document.getElementById("img01");
        var modal = document.getElementById("myModal");

        modal.style.display = "block";
        modalImg.src = this.src;


        // $('#myModal').attr("style.display", "block")
        // $('#img01').attr("src", $(this).attr("src"));
      });

      $(".close-image").click(function() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
      });

    });
</script>
@endsection