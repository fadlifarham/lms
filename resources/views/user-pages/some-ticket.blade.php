@extends('user-pages/layout')

@section('title', 'Materi | LMS')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 10pt;">
            <li class="breadcrumb-item"><a href="{{ route('ticket') }}">Tiket</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $ticket->module->name }}</li>
            <li class="breadcrumb-item active" aria-current="page">Section {{ $id_section }}</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        {{-- {{ $learn_video }} --}}
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Materi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    {{-- {{ $section }} --}}
                <tr>
                    <th>No. </th>
                    <th>Target</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    {{-- {{ $learn_video }} --}}
                    @php 
                        $status = ['Lihat', 'Lihat', 'Kerjakan', 'Lihat', 'Lihat', 'Kerjakan', 'Kerjakan'];
                        $materials = ['Overview', 'Instruction', 'Pre Test', 'Presentasi', 'Knowledge', 'Post Test', 'Examines'];
                        $n_video = $learn_video->count();
                    @endphp
                    @for($i = 0; $i < 7; $i++)
                        @php $index = $i + 1; @endphp
                        <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $materials[$i] }}</td>
                            <td>
                                <button
                                    style="width: 100px;"
                                    id="{{$index}}"
                                    value="{{ $ticket->id }}"
                                    {{-- @if($ticket->progress_in_section < $index)
                                    hidden
                                    @endif 
                                    @if($ticket->progress_in_section > 3)
                                        @if($index == 3)
                                        hidden
                                        @endif
                                    @endif
                                    @if($ticket->progress_in_section > 6)
                                        @if($index == 6)
                                        hidden
                                        @endif
                                    @endif --}}
                                    {{-- data-toggle="modal" 
                                    data-target="#myModal" --}}
                                    
                                    {{--@if($index == 3 || $index == 6)
                                    data-toggle="modal" 
                                    data-target="#pretest"
                                    @endif--}}
                                    
                                    {{-- @if($index != 4)
                                        hidden
                                    @endif --}}
                                    
                                    {{-- 
                                    @if($index == 6)
                                    data-toggle="modal" 
                                    data-target="#prete"
                                    @endif --}}
                                    class="do btn button-primary font-primary">
    
                                    {{ $status[$i] }}
    
                                </button>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
            </div>
        </div>

        {{-- Modal --}}
        <div class="modal fade-scale" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" >
                        <strong><p>Overview</p></strong>
                    </div>
                    <div class="modal-body" >
                        {{-- <div class="form-group">
                            <iframe width="470" height="315" frameborder="0" allowfullscreen
                            src="{{ $overview->link }}">
                            </iframe>
                        </div> --}}
                        <div class="form-group">
                            <h3 class="text-center">Overview</h3>
                        </div>
                        <div class="form-group">
                            <p>{{ $overview->description }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Instruction --}}
        <div class="modal fade-scale" id="myInstruction" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" >
                        <strong><p>Instruction</p></strong>
                    </div>
                    <div class="modal-body" >
                        {{-- <div class="form-group">
                            <iframe width="470" height="315" frameborder="0" allowfullscreen
                            src="{{ $overview->link }}">
                            </iframe>
                        </div> --}}
                        <div class="form-group">
                            <h3 class="text-center">Instruction</h3>
                        </div>
                        <div class="form-group">
                            <p>{!! $section->instruction !!}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="close-instruction" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Knowledge --}}
        <div class="modal fade-scale" id="myKnowledge" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" >
                        <strong><p>Knowledge</p></strong>
                    </div>
                    <div class="modal-body" >
                        {{-- <div class="form-group">
                            <iframe width="470" height="315" frameborder="0" allowfullscreen
                            src="{{ $overview->link }}">
                            </iframe>
                        </div> --}}
                        <div class="form-group">
                            <h3 class="text-center">Knowledge</h3>
                        </div>
                        <div class="form-group">
                            <p>{{ $section->knowledge }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="close-knowledge" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Examines --}}
        <div class="modal fade-scale" id="myExamines" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" >
                        <strong><p>Examines</p></strong>
                    </div>
                    <div class="modal-body" >
                        {{-- <div class="form-group">
                            <iframe width="470" height="315" frameborder="0" allowfullscreen
                            src="{{ $overview->link }}">
                            </iframe>
                        </div> --}}
                        <div class="form-group">
                            <h3 class="text-center">Examines</h3>
                        </div>
                        <div class="form-group">
                            <p>Tugas yang telah dikerjakan dapat dikumpulkan melalui link berikut. Terimakasih.</p>
                            <button class="btn btn-primary">{{ $section->examines }}</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="close-examines" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Video --}}
        <div class="modal fade-scale" id="videoModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header-ppt" >
                        {{-- <p>Presentasi</p> --}}
                    </div>
                    <div class="modal-body" >
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="{{ $learn_video->link }}" class="embed-responsive-item" frameborder="0" width="1000" height="1000" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="close_video" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- BATAS FITUR --}}

        {{-- PreTest --}}
        <div class="modal fade" id="pretest" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" >
                        <strong><p>Pre Test & Post Test</p></strong>
                    </div>
                    <div class="modal-body" >
                        <div class="">
                            <p>Fitur ini belum tersedia</p>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button id="close_video" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    $(document).ready(function() {
        var id;
        var id_button;
        var n_video = @php echo $n_video; @endphp;
        var id_video = 1;
        var learn_video = @php echo $learn_video; @endphp;
        var id_section = @php echo $section->id; @endphp;
        
        // console.log(id_section);
        // console.log(learn_video[1].id);
        
        $('.do').click(function() {
            id = $(this).val();
            id_button = $(this).attr('id');
            var index_now = @php echo $ticket->progress_in_section @endphp;

            // if (id_button == index_now) {
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         type: 'get',
            //         url: APP_URL + '/update_ticket_section/' + id,
            //         success: function(data) {			
            //             console.log(data);
            //         },
            //         error: function(e) {
            //             console.log(e);
            //         }
            //     });
            // }

            // if (id_button >= 7) {
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         type: 'get',
            //         url: APP_URL + '/update_ticket/' + id,
            //         success: function(data) {
            //             console.log(data);
            //         },
            //         error: function(e) {
            //             console.log(e);
            //         }
            //     });
            // }

            if (id_button == 1) {
                $('#myModal').modal('show');
            } else if (id_button == 4) {
                $('#videoModal').modal('show');
            } else if(id_button == 3) {
                window.location.href = APP_URL + '/pretest/' + id + '/' + id_section;
            } else if(id_button == 6) {
                window.location.href = APP_URL + '/posttest/' + id + '/' + id_section;
            } else if (id_button == 2) {
                $('#myInstruction').modal('show');
            } else if (id_button == 5) {
                $('#myKnowledge').modal('show');
            } else if (id_button == 7) {
                //$('#myExamines').modal('show');
                window.location.href = APP_URL + '/examines/' + id + '/' + id_section;
            }
        });

        $('#close').click(function() {
            window.location.href = APP_URL + '/ticket/' + id + '/' + id_section;
        });

        $('#close_video').click(function() {
            window.location.href = APP_URL + '/ticket/' + id + '/' + id_section;
        });

        $('#close-instruction').click(function() {
            window.location.href = APP_URL + '/ticket/' + id + '/' + id_section;
        });

        $('#close-knowledge').click(function() {
            window.location.href = APP_URL + '/ticket/' + id + '/' + id_section;
        });

        $('#close-examines').click(function() {
            window.location.href = APP_URL + '/section/' + id;
        });

        $('.next').click(function() {
            
            if (id_video == 1) {
                $('.back').removeAttr("disabled");
            }
            if (id_video == n_video - 1) {
                $('.next').prop("disabled", true);
            } 
            id_video += 1;
            $('#video').attr('src', learn_video[id_video].link);
            $('#description').text(learn_video[id_video].description);

            console.log(id_video);
        });

        $('.back').click(function() {
            
            if (id_video == n_video) {
                $('.next').removeAttr("disabled");
            }
            if (id_video == 2) {
                $('.back').prop("disabled", true);
            } 
            id_video -= 1;
            $('#video').attr('src', learn_video[id_video].link);
            $('#description').text(learn_video[id_video].description);

            console.log(id_video);
        });
    });
</script>
@endsection