<?php
    use App\Http\Controllers\HelperController;
?>

@extends('user-pages/layout')

@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="font-size: 10pt;">
			<li class="breadcrumb-item"><a href="{{ route('companylist') }}">Kelas</a></li>
			<li class="breadcrumb-item active" aria-current="page">Daftar Peserta</li>
		</ol>
	</nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Peserta - {{ $company->name }}</h6>
        </div>
        <div class="table-responsive w-100 col-12">
            <table class="table table-bordered w-100 col-12">
                <thead>
                <tr>
                    <th style="width: 1%">No</th>
                    <th>Nama</th>
                    <th>Latihan</th>
                    <th>Sertifikasi</th>
                    <th>HOT</th>
                </tr>
                </thead>
                <tbody>
                    @if($peserta->count() == 0)
                        <tr>
                            <td colspan="5" class="text-center">Tidak Ada Member Dalam Kelas Ini</td>
                        </tr>
                    @else
                        @php $i = 1; @endphp
                        @foreach ($peserta as $item)
                            @php 
                                $latihan = $item->score->where('type', 0)->last();
                                $sertifikasi = $item->score->where('type', 1)->last();
                                $hot = $item->hot_score->last();
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->user->name }}</td>

                                @if($latihan == NULL)
                                    <td>Belum Dikerjakan</td>
                                @else
                                    <td>
                                        {{ HelperController::scoring($latihan->correct, $latihan->wrong, $latihan->not_answered) }}
                                    </td>
                                @endif

                                @if($sertifikasi == NULL)
                                    <td>Belum Dikerjakan</td>
                                @else
                                    <td>{{ HelperController::scoring($sertifikasi->correct, $sertifikasi->wrong, $sertifikasi->not_answered) }}</td>
                                @endif

                                @if($hot == NULL)
                                    <td>Belum Dikerjakan</td>
                                @else
                                    <td>{{ $hot->total }}</td>
                                @endif
                                {{-- <td>{{ $item->user->status_id }}</td>
                                <td>{{ $item->user->status_id }}</td> --}}
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
