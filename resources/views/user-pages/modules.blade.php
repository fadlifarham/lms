@extends('user-pages/layout')

@section('title', 'Modul | LMS')

@section('css')
<style>
    .resp-container {
        position: relative;
        overflow: hidden;
        padding-top: 56.25%;
        margin-left: 5%;
        margin-right: 5%;
        margin-bottom: 5%;
        height: 50%;
    }

    .resp-iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }
    #intro .play-btn {
        width: 94px;
        height: 94px;
        background: radial-gradient(#f82249 50%, rgba(101, 111, 150, 0.15) 52%);
        border-radius: 50%;
        display: block;
        position: relative;
        overflow: hidden;
    }

    #intro .play-btn::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translateX(-40%) translateY(-50%);
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 100;
        transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }

    #intro .play-btn:before {
        content: '';
        position: absolute;
        width: 120px;
        height: 120px;
        -webkit-animation-delay: 0s;
        animation-delay: 0s;
        -webkit-animation: pulsate-btn 2s;
        animation: pulsate-btn 2s;
        -webkit-animation-direction: forwards;
        animation-direction: forwards;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-timing-function: steps;
        animation-timing-function: steps;
        opacity: 1;
        border-radius: 50%;
        border: 2px solid rgba(163, 163, 163, 0.4);
        top: -15%;
        left: -15%;
        background: rgba(198, 16, 0, 0);
    }

    #intro .play-btn:hover::after {
        border-left: 15px solid #f82249;
        -webkit-transform: scale(20);
        transform: scale(20);
    }

    #intro .play-btn:hover::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translateX(-40%) translateY(-50%);
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border: none;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 200;
        -webkit-animation: none;
        animation: none;
        border-radius: 0;
    }

    @media screen and (max-width: 769px) {
        .videos-section {
            visibility: hidden;
            clear: both;
            float: left;
            margin: 10px auto 5px 20px;
            width: 28%;
            display: none;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="font-size: 10pt;">
			<li class="breadcrumb-item"><a href="{{ route('ticket') }}">Tiket</a></li>
		    <li class="breadcrumb-item active" aria-current="page">{{ $ticket->module->name }}</li>
		</ol>
	</nav>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary text-center h3">{{ $ticket->module->name }} - {{ $ticket->ticket_type->name}}</h3>
      </div>
      <div class="card-body">
          {{-- {{ $ticket->module->section[0]->score }} --}}
            <div class="form-group">

                <!-- Deskripsi -->
                <h5 class="font-weight-bold text-primary h5"><strong></strong> Deskripsi </h5>
                <hr>
                <h6><span>{{ $ticket->module->description }} </span></h6> 
                <br><br>

                {{--<h5 class="font-weight-bold text-primary h3"><strong></strong> Benefit </h5><hr><br>
                <h6> {{ $ticket->module->benefits }} </h6><br>

                <h5 id="preview" class="font-weight-bold text-primary h3">Preview Video</h5><hr><br>
                <h6> Preview </h6>
                <div class="videos-section">
                    <iframe width="560" height="315" src="{{ $ticket->module->preview }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br>
                </div>

                <div class="modal fade-scale" id="videos" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body" style="background-color: transparent !important;">
                                <div class="col-12">
                                  <iframe width="100%" height="315" src="{{ $ticket->module->preview }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <div class="col-12 text-center">
                                    <button id="close-examines" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-sm-block d-block d-md-none text-center mb-4">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#videos">Lihat Video</button>
                </div> --}}

                {{--<h5 id="precons" class="font-weight-bold text-primary h3">Pre-condition</h5><hr><br>
                <h6>{{ $ticket->module->precondition }} </h6><br>

                <h5 id="targets" class="font-weight-bold text-primary h3">Target to be Achieved</h5><hr><br>
                <h6> {{ $ticket->module->target }} </h6><br>--}}

                {{-- <h5 id="req" class="font-weight-bold text-primary h5">Prasyarat</h5><hr>
                <h6> {{ $ticket->module->requirements }} </h6><br><br> --}}

                <!-- Materi -->
                <h5 id="learning-list" class="font-weight-bold text-primary h5">Materi</h5><hr>
                <div style="overflow-x:auto;">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th style="color: black;"><center>No.</center></th>
                            <th style="color: black;"><center>Judul</center></th>
                            {{-- <th style="color: black;"><center>Video</center></th> --}}
                            <th style="color: black;"><center>Slide</center></th>
                        </tr>
                        @php $i = 1; @endphp
                        @foreach ($section as $item)
                            <tr>
                                <td style="color: black;"><center>{{ $i }}</center></td>
                                <td style="color: black;">{{ $item->title }}</td>
                                {{-- <td style="color: black;">
                                    <center>
                                        <button
                                            value="{{ $item->id }}"
                                            class="do btn button-primary font-primary lihat_video">

                                            Lihat
                                        </button>
                                    </center>
                                </td> --}}
                                <td style="color: black;"><center>
                                    <button
                                        value="{{ $item->id }}"
                                        class="do btn button-primary font-primary lihat">

                                        Lihat
                                    </button>
                                </center></td>
                            </tr>
                            @php $i+=1; @endphp
                        @endforeach
                        
                    </table><br><br>
                </div>

                <!-- Ujian -->
                <h5 id="req" class="font-weight-bold text-primary h5">Ujian</h5><hr>
                <div style="overflow-x:auto;">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tr>
                            <th style="color: black;"><center>No.</center></th>
                            <th style="color: black;"><center>Tipe</center></th>
                            <th style="color: black;"><center>Sisa Kesempatan</center></th>
                            <th style="color: black;"><center>Aksi</center></th>
                            <th style="color: black;"><center>Hasil</center></th>
                        </tr>

                        @php $i = 1; @endphp

                        <!-- Latihan -->
                        <tr>
                            <td style="color: black;"><center>{{$i}}</center></td>
                            <td style="color: black;">Latihan</td>
                            <td class="text-center" style="color: black;"> - </td>
                            <!--/posttest/{{$ticket->id}}/{{$ticket->module->id}}-->
                            <td><center><a id="" href="{{ route('posttest', [$ticket->id, $ticket->module->id]) }}" class="btn button-primary font-primary">Kerjakan</a></center></td>
                            @if($result_latihan == NULL)
                                <td style="color: black;"><center>Belum Ada Hasil</center></td>
                            @else
                                <td class="text-center" style="color: black;">{{$result_latihan}}</td>
                            @endif

                            @php
                                $i++;
                            @endphp
                        </tr>

                        <!-- Sertifikasi -->
                        @if($ticket->ticket_type_id == 3 OR $ticket->ticket_type_id == 4)
                        <tr>
                            <td style="color: black;"><center>{{$i}}</center></td>
                            <td style="color: black;">Sertifikasi</td>
                            <td class="text-center" style="color: black;">{{ $ticket->sertifikasi_chance }}</td>
                            
                            <!--/posttest/{{$ticket->id}}/{{$ticket->module->id}}-->
                            <td>
                                <center>
                                    <a 
                                        {{-- data-toggle="modal" 
                                        data-target="#sertifikasiModal"  --}}
                                        class="sertifikasi_button btn button-primary font-primary">
                                        Kerjakan
                                    </a>
                                </center>
                            </td>
                            
                            @if($result_sertifikasi == NULL)
                                <td style="color: black;"><center>Belum Ada Hasil</center></td>
                            @else
                                <td class="text-center" style="color: black;">{{$result_sertifikasi}}</td>
                            @endif

                            @php $i++; @endphp

                        </tr>
                        @endif

                        <!-- HOT -->
                        @if($ticket->ticket_type_id >= 3)
                        <tr>
                            <td style="color: black;"><center>{{$i}}</center></td>
                            <td style="color: black;">Sertifikasi Higher-Order Thinking</td>

                            <td class="text-center" style="color: black;">{{ $ticket->hot_chance }}</td>
                            
                            <!--/posttest/{{$ticket->id}}/{{$ticket->module->id}}-->
                            {{-- <td><center><a id="" href="{{ route('posttest', [$ticket->id, $ticket->module->id]) }}" class="btn button-primary font-primary">Kerjakan</a></center></td> --}}
                            {{-- <td colspan="2" class="text-center" style="color: black;">Saat ini belum tersedia</td> --}}
                            
                            <td>
                                <center>
                                        <a 
                                            {{-- data-toggle="modal" 
                                            data-target="#hotModal"  --}}
                                            class="hot_button btn button-primary font-primary">
                                            
                                            Kerjakan
                                        </a>
                                        {{-- <a id="" href="{{ route('getHighOrderThinking', [$ticket->id]) }}" class="btn button-primary font-primary">Kerjakan</a> --}}
                                </center>
                            </td>

                            @if($score_hot == NULL)
                                <td style="color: black;"><center>Belum Ada Hasil</center></td>
                            @else
                                <td class="text-center" style="color: black;">{{$score_hot->total}}</td>
                            @endif
                        </tr>
                        @endif

                       
                    </table><br><br>
                </div>

                <!-- Referensi -->
                <h5 id="ref" class="font-weight-bold text-primary h5">Referensi</h5><hr>
                    @foreach($section as $item)
                        @if($item->reference != NULL)
                        <a href={{ $item->reference }}>{{($item->reference)}}</a>
                        <br>
                        @endif
                    @endforeach
                <br><br><br>

                <!-- Sertifikat -->
                @if($status == 2)
                <h5 id="certificate" class="font-weight-bold text-primary h5">Sertifikat</h5><hr>
                @if($ticket->certificate == NULL || $ticket->certificate == "Belum Tersedia")
                    <p>Saat ini sertifikat belum tersedia untuk diunduh</p>
                @else
                    <a href="{{ $ticket->certificate }}" class="button button-primary font-primary btn-lg"><i class="fa fa-download"></i> Download di sini</a><br><br>
                @endif

                @endif
            </div>
      </div>

      {{-- Presentasi --}}
      <div class="modal fade-scale" id="videoModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header-ppt2" >
                        {{-- <p>Presentasi</p> --}}
                        <h5 class="modal-title" id="exampleModalLongTitle"> </h5>
                        <a data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true"><i class="fas fa-window-close fa-2x" style="color: #c92020; cursor:pointer;"></i></span>
                        </a>
                    </div>
                    <div class="modal-body" >
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="" class="embed-responsive-item presentasi" frameborder="0" width="1000" height="1000" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                            {{-- <iframe src="{{ $learn_video->link }}" class="embed-responsive-item" frameborder="0" width="1000" height="1000" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button id="close_video" type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Video --}}
        <div class="modal fade-scale" id="theVideoModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header-ppt2" >
                        {{-- <p>Presentasi</p> --}}
                        <h5 class="modal-title" id="exampleModalLongTitle"> </h5>
                        <a data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-window-close fa-2x" style="color: #c92020; cursor:pointer;"></i></span>
                        </a>
                    </div>
                    <div class="modal-body" >
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="" class="embed-responsive-item video_src" frameborder="0" width="1000" height="1000" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                            {{-- <iframe src="{{ $learn_video->link }}" class="embed-responsive-item" frameborder="0" width="1000" height="1000" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button id="close_video" type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sertifikasi Modal -->
        <div class="modal" id="sertifikasiModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" >
                        {{-- <p>Kode Sertifikasi</p> --}}
                    </div>
                    <div class="modal-body" >
                        <div class="embed-responsive  ">
                            <label class="label-control">Masukkan Kode Sertifikasi Anda :</label>
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <div style="margin: 10px;">
                                    <input class="form-control" id="kode_sertifikasi" type="text" style="width: 500px;">
                                </div>
                                <div style="margin: 10px;">
                                    <button class="submitSertifikasi form-control btn-primary font-primary" style="width: 150px;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- HOT Modal -->
        <div class="modal" id="hotModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" >
                        {{-- <p>Kode Sertifikasi</p> --}}
                    </div>
                    <div class="modal-body" >
                        <div class="embed-responsive  ">
                            <label class="label-control">Masukkan Kode Sertifikasi Anda :</label>
                            <div class="flex" style="display: flex; flex-direction: row;">
                                <div style="margin: 10px;">
                                    <input class="form-control" id="kode_hot" type="text" style="width: 500px;">
                                </div>
                                <div style="margin: 10px;">
                                    <button class="submitHOT form-control btn-primary font-primary" style="width: 150px;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        var id = @php echo $ticket->id @endphp;
        var sertifikasi_chance = @php echo $ticket->sertifikasi_chance @endphp;
        var hot_chance = @php echo $ticket->hot_chance @endphp;

        $('.lihat').click(function() {
            var id_button = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: APP_URL + '/postPPT',
                data: {
                    'section_id': id_button
                },
                success: function(data) {
                    // $('.presentasi').attr("src", data.video[0].link);	
                    $('.presentasi').attr("src", data.examines);
                    $('#videoModal').modal('show');
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });

        $('.lihat_video').click(function() {
            var id_button = $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: APP_URL + '/postVideo',
                data: {
                    'section_id': id_button
                },
                success: function(data) {
                    // $('.presentasi').attr("src", data.video[0].link);	
                    $('.video_src').attr("src", data.link_video);
                    $('#theVideoModal').modal('show');
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });

        $("#theVideoModal").on('hidden.bs.modal', function (e) {
            $("#theVideoModal iframe").attr("src", $("#theVideoModal iframe").attr("src"));
        });

        $(".sertifikasi_button").click(function() {
            if (sertifikasi_chance <= 0) {
                Swal.fire({
					position: 'center',
					type: 'info',
					title: 'Anda sudah melakukan Test ini lebih dari 3 kali',
					showConfirmButton: false,
					timer: 1500
				}).then(function() {
					location.reload();
				});
            } else {
                $('#sertifikasiModal').modal({show: 'fade'});
            }
        });

        $(".submitSertifikasi").click(function() {
            var kode_sertifikasi = $("#kode_sertifikasi").val();

            Swal.fire({
                title: "Sisa kesempatan yang Anda miliki adalah " + sertifikasi_chance + " kali",
                text: "Anda yakin ingin meneruskan proses ini?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Info",
                        text: "Nilai yang di ambil adalah nilai ujian paling terakhir",
                        type: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Batal',
                        confirmButtonText: 'Lanjut'
                    }).then((result) => {
                        if (result.value) {
                            submitSertifikasi(kode_sertifikasi, id);
                        } else {
                            location.reload();
                        }
                    });
                } else {
                    location.reload();
                }
            });
        });

        function submitSertifikasi(kode_sertifikasi, id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: APP_URL + '/sertifikasi-user',
                data: {
                    'ticket_id': id,
                    'kode_sertifikasi': kode_sertifikasi,
                    'status': 'sertifikasi'
                },
                success: function(data) {
                    if (data.code == 400) {
                        Swal.fire({
                            position: 'center',
                            type: 'warning',
                            title: 'Kode Sertifikasi Salah',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else if (data.code == 200) {
                        location.href = APP_URL + "/sertifikasi/" + id;
                    }
                },
                error: function(e) {
                    console.log(e);
                }
            });
        }

        // $('#sertifikasiModal').on('hidden.bs.modal', function () {
        //     location.reload();
        // })

        $(".hot_button").click(function() {
            if (hot_chance <= 0) {
                Swal.fire({
					position: 'center',
					type: 'info',
					title: 'Anda sudah melakukan Test ini lebih dari 3 kali',
					showConfirmButton: false,
					timer: 1500
				}).then(function() {
					location.reload();
				});
            } else {
                $('#hotModal').modal({show: 'fade'});
            }
        });
        

        $(".submitHOT").click(function() {
            var kode_sertifikasi = $("#kode_hot").val();

            Swal.fire({
                title: "Sisa kesempatan yang Anda miliki adalah " + hot_chance + " kali",
                text: "Anda yakin ingin meneruskan proses ini?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Tidak',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Info",
                        text: "Nilai yang di ambil adalah nilai ujian paling terakhir",
                        type: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Batal',
                        confirmButtonText: 'Lanjut'
                    }).then((result) => {
                        if (result.value) {
                            submitHOT(kode_sertifikasi, id);
                        } else {
                            location.reload();
                        }
                    });
                } else {
                    location.reload();
                }
            });
        });

        function submitHOT(kode_sertifikasi, id) {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: APP_URL + '/sertifikasi-user',
                data: {
                    'ticket_id'         : id,
                    'kode_sertifikasi'  : kode_sertifikasi,
                    'status'            : "hot"
                },
                success: function(data) {
                    if (data.code == 400) {
                        Swal.fire({
                            position: 'center',
                            type: 'warning',
                            title: 'Kode Sertifikasi Salah',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else if (data.code == 200) {
                        location.href = APP_URL + "/high-order-thinking/" + id;
                    }
                },
                error: function(e) {
                    console.log(e);
                }
            });
        }

        // $('#hotModal').on('hidden.bs.modal', function () {
        //     location.reload();
        // })
    });
</script>
@endsection