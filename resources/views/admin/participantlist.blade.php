@extends('user-pages/layout')

@section('css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container-fluid">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="font-size: 10pt;">
			  <li class="breadcrumb-item active"><a>Daftar Pembelajar Modul</a></li>
			</ol>
		</nav>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Daftar Pembelajar pada Modul</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
						<tr>
							<th>ID User</th>
							<th>Nama Modul</th>
                            <th>Progress Modul</th>
                            <th>Progress Section</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($ticket as $p)
							@if($p->user_id != 0)
                            <tr>
                                <td>{{ $p->user_id }}</td>
                                <td>{{ $p->module->name }}</td>
                                <td>{{ $p->progress_in_module }}</td>
                                <td>{{ $p->progress_in_section }}/7</td>
                            </tr>
							@endif
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection