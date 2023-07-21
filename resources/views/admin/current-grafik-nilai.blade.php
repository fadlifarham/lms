@extends('user-pages/layout')

@section('css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb" style="font-size: 10pt;">
		<li class="breadcrumb-item"><a href="{{ route('companylist') }}">Kelas</a></li>
		<li class="breadcrumb-item active" aria-current="page">Daftar Nilai</li>
	</ol>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nilai Sertifikasi</h6>
        </div>
		<div class="card-body">
			<div class="table-responsive">
                <p>Tanggal :</p>
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
						<tr>
							<th>No</th>
							<th>Range Nilai</th>
							<th>Jumlah Peserta</th>
						</tr>
					</thead>
					<tbody>
                        @php 
                            $i = 1;
                            $start = 0;
                        @endphp
                        @foreach($list_nilai as $item)
                        <tr>
							@if($i == 1)
								<td>{{ $i }}</td>
								<td>{{ $start }} - {{ $start + 10 }}</td>
								<td>{{ $item }}</td>
							@else
								<td>{{ $i }}</td>
								<td>{{ $start + 1 }} - {{ $start + 10 }}</td>
								<td>{{ $item }}</td>
							@endif
                        </tr>    
                        @php 
                            $i++;
                            $start += 10;
                        @endphp
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection