@extends('user-pages/layout')

@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="font-size: 10pt;">
			<li class="breadcrumb-item"><a href="{{ route('getAdminSertifikasi') }}">Sertifikasi</a></li>
			<li class="breadcrumb-item active" aria-current="page">List Anggota</li>
		</ol>
	</nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Anggota</h6>
        </div>
        {{-- <div class="card-body">
            <button 
                class="form-control btn-info"
                data-toggle="modal"
                data-target="#createModal">
                Create
            </button>
        </div> --}}

        <div class="table-responsive w-100 col-12">
            <table class="table table-bordered w-100 col-12">
                <thead>
                <tr>
                    <th style="width: 1%">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    {{-- <th>Status</th>
                    <th style="width: 20%">Aksi</th> --}}
                </tr>
                </thead>
                <tbody>
                    @if($sertifikasi->count() == 0)
                        <tr>
                            <td colspan="3" class="text-center">Tidak Ada Member Dalam Sertifikasi Ini</td>
                        </tr>
                    @else
                        @php $i = 1; @endphp
                        @foreach ($sertifikasi as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->email }}</td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
