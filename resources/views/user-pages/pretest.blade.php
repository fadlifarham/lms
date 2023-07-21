{{-- {{ $section }} --}}
@extends('user-pages/layout')

<style>
.choose-btn {
  background-color: #ffffff;
  color: black;
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  text-align: left;
  margin: 0;
}

.choose-btn:hover{
  background-color:  #ffd11a;
  color: black;
}

.choose-btn:focus{
  background-color:  #ffe066;
  color: black;
}

</style>

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 10pt;">
            <li class="breadcrumb-item"><a href="{{ route('ticket') }}">Tiket</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $ticket->module->name }}</li>
            <li class="breadcrumb-item active" aria-current="page">Section {{ $id_section }}</li>
            <li class="breadcrumb-item active" aria-current="page">Pre Test</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 id="counter_question" class="m-0 font-weight-bold text-primary text-center">Pre-Test</h6>
      </div>
      <div class="card-body">    
            <div id="question" class="form-group">
                <div class="text-center">
                  <img id="problem_picture" alt="."> 
                </div>
                <h6 id="problem"></h6> <br>
                <button class="choose choose-btn" name="soal" value="1"> <span id="option_a"></span> </button>  <br><br>
                <button class="choose choose-btn" name="soal" value="2"> <span id="option_b"></span> </button>  <br><br>
                <button class="choose choose-btn" name="soal" value="3"> <span id="option_c"></span> </button>  <br><br>
                <button class="choose choose-btn" name="soal" value="4"> <span id="option_d"></span> </button>  <br><br>
                <button id="submit" class="btn button-primary font-primary" style="float: right; width: 25%;">Submit</button>
            </div>

            <div id="score" style="display: none" class="form-group">
              <h5><b>Nilai Anda  :</b></h5>
              <h6> Jawaban Benar : <span id="benar"></span> </h6>
              <h6> Jawaban Salah : <span id="salah"></span> </h6>
              <h6> Tidak Dijawab : <span id="tidak_jawab"></span> </h6>
              <h6> Total Nilai   : <span id="total"></span></h6>
              <button id="back" role="button" class="btn btn-lg btn-success">Kembali ke Tiket</button>
            </div>

      </div>
    </div>
</div>

<script>
    $(document).ready(function() {
      var questions = @php echo $section->question->shuffle(); @endphp;
      var n = questions.length;
      var sum = 0;
      var answer;
      var no_answer = 0;
      var score;
      var index = 0;
      var jwb;
      changeQuestion(index, questions[index], n);

      

      $('html, body').animate({
        scrollTop: $('#counter_question').offset().top
      }, 'slow');

      $('#submit').click(function() {
        // cek benar atau salah
        //answer = $('.choose:checked').val();
        if (jwb == questions[index].answer) {
          sum += 1;
        } else if (jwb == undefined) {
          no_answer += 1;
        }
        console.log("");
        console.log("Submit Clicked");
        
        index += 1;
        
        if (index < n) {
          changeQuestion(index, questions[index], n);
          console.log("change question");
        }

        if ( index == n - 1 ) {
          console.log('');
          $('#submit').text('Selesai');
        } 
        

        if (index == n) {
          score = sum / n * 100;
          $('#total').text(score);
          $('#benar').text(sum);
          $('#salah').text(n - (sum + no_answer));
          $('#tidak_jawab').text(no_answer);
          $('#header').text('Terimakasih, Anda Telah Menyelesaikan PreTest');

          $('#div_counter_question').hide();
          $('#question').hide();
          $('#score').show();
        }

      });

      $('.choose').click(function(){
        jwb = $(this).val();
        console.log(jwb);
      });

      $('#back').click(function() {
        var id_ticket = @php echo $ticket->id; @endphp;
        var id_section = @php echo $section->id; @endphp;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: APP_URL + '/pretest',
            data: {
              'correct': sum,
              'wrong' : n - (sum + no_answer),
              'not_answered' : no_answer,
              'ticket_id': id_ticket,
              'section_id': id_section
            },
            success: function(data) {	
                console.log(data);
                window.location.href = APP_URL + '/ticket/' + id_ticket + '/' + id_section;
            },
            error: function(e) {
                console.log(e);
            }
        });

        
      });
    });

    function changeQuestion(index, question, n) {
      // console.log();

      var number = index + 1;
      $('#problem').text(number + ". " + question.problem);
      $('#problem_picture').attr('src', question.picture);
      
      $('#option_a').text(question.option_a);
      $('#option_b').text(question.option_b);
      $('#option_c').text(question.option_c);
      $('#option_d').text(question.option_d);
      $(".choose").removeAttr("checked");
      $("#counter_question").text("Soal " + number + "/" + n);
    }
</script>
@endsection