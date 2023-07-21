@extends('user-pages/layout')

@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 10pt;">
            <li class="breadcrumb-item active"><a>Sertifikasi</a></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Buat Sertifikasi</h6>
        </div>
        <div class="card-body">
            <button 
                class="form-control button-primary font-primary"
                data-toggle="modal"
                data-target="#createModal" style="width: 200px">
                <i class="fas fa-fw fa-plus"></i> Buat Sertifikasi
            </button>
        </div>

        <div class="table-responsive w-100 col-12">
            <table class="table table-bordered w-100 col-12">
                <thead>
                <tr>
                    <th style="width: 1%">ID</th>
                    <th>Kode Sertifikasi</th>
                    <th>Nama Modul</th>
                    <th>Status</th>
                    <th style="width: 20%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @if($kode_sertifikasi->count() == 0)
                        <tr>
                            <td colspan="5" class="text-center">Tidak Ada Sertifikasi</td>
                        </tr>
                    @else
                        @php $i = 1; @endphp
                        @foreach ($kode_sertifikasi as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->module->name }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ url('admin/sertifikasi/'.$item->id) }}" class="btn btn-success">
                                    {{-- <button class="btn btn-success"> --}}
                                        <i class="fa fa-eye">
                                           
                                        </i>
                                    {{-- </button> --}}
                                    </a>
                                </td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>


<div class="modal fade" id="createModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buat Sertifikasi</h6>
            </div>
            <div class="modal-body" >
                <div class="embed-responsive ">
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <label>Pilih Modul</label>
                            <select id="module" class="browser-default custom-select">
                                <option selected disabled>Pilih Modul</option>
                                @foreach($module as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <label>Tanggal Training</label>
                            <input id="training_date" type="date" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <label>Buat Kode Sertifikasi</label>
                            <input id="kode_sertifikasi" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-lg-2">
                            <br><button class="create-sertifikasi form-control btn-info" onclick="createSertifikasi()">Create</button>
                        </div>
                    </div>
                    
                    {{-- <iframe src="" class="embed-responsive-item presentasi" frameborder="0" width="1000" height="1000" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe> --}}
                    {{-- <iframe src="{{ $learn_video->link }}" class="embed-responsive-item" frameborder="0" width="1000" height="1000" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button id="close_video" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('javascript')
    <script>
        // $(document).ready(function() {

        // });

        function createSertifikasi() {
            var kode = $('#kode_sertifikasi').val();
            var module_id = $('#module').val();
            var training_date = $('#training_date').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: APP_URL + '/admin/ajax-create-sertifikasi',
                data: {
                'kode': kode,
                'module_id': module_id,
                'training_date': training_date
                },
                success: function(data) {		
                    // window.location.href = APP_URL + '/section/' + id_ticket;
                    location.reload();
                    console.log(data);
                },
                error: function(e) {
                    console.log(e);
                }
            });
        }        
    </script>
@endsection