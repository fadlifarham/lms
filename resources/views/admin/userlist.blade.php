@extends('user-pages/layout')

@section('css')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container-fluid">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="font-size: 10pt;">
			  <li class="breadcrumb-item active"><a>Daftar Pengguna</a></li>
			</ol>
		</nav>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
						<tr>
							<th>ID User</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Status</th>
							<th>Hapus</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($user as $user)
							@if($user->id != $myid)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->status->name }}</td>
									<td>
										<center>
											<a 
												href="javascript:;" 
												data-toggle="modal" 
												onclick="deleteUser({{$user->id}})" 
												data-target="#DeleteModal" 
												class="btn btn-xs btn-danger">

												<i class="fa fa-trash"></i>
											
											</a>

											<a 
												href="javascript:;" 
												data-toggle="modal" 
												onclick="update({{$user->status->id}}, {{$user->id}})" 
												data-target="#editModal" 
												class="btn btn-xs btn-info">

												<i class="fa fa-edit"></i>
											
											</a>
										</center>
									</td>
								</tr>
							@endif
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>

		<!-- Modal -->
		<div id="DeleteModal" class="modal fade text-danger" role="dialog">
			<div class="modal-dialog ">
				<!-- Modal content-->
				<form action="" id="deleteForm" method="post">
					<div class="modal-content">
						<div class="modal-header">
							{{-- <strong><p>Hapus User</p></strong> --}}
						</div>
						<div class="modal-body">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<p class="text-center">Apakah Anda yakin ingin menghapus user ini?</p>
						</div>
						<div class="modal-footer">
							<center>
								<button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							</center>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- Edit Modal -->
		<div id="editModal" class="modal fade text-danger" role="dialog">
			<div class="modal-dialog ">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							{{-- <strong><p>Hapus User</p></strong> --}}
						</div>
						<div class="modal-body">
							<input hidden type="text" id="user_id" value="">
							<label style="color: black; margin-left: 10px;" class="label-control black">Ubah Status :</label>
							<div style="display: flex; flex-direction: row;">
								<div style="margin: 10px; width: 500px;">	
									<select class="form-control" id="status">
										<option value="1">Mahasiswa</option>
										<option value="2">Dosen</option>
									</select>
								</div>
								<div style="margin: 10px;">
									<button class="form-control btn-primary" onclick="submit()">Submit</button>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<center>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
					</div>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
     function deleteUser(id)
     {
         var id = id;
         var url = '{{ route("deleteUser", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

	 function update($status_id, $user_id) {
		$("#status").val($status_id);
		$("#user_id").val($user_id);
	 }

	 function submit() {
		 var status_id = $("#status").val();
		 var user_id = $("#user_id").val();
		 
		 $.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type: 'post',
			url: APP_URL + '/admin/edit-user-list',
			data: {
				'status_id': status_id,
				'user_id': user_id
			},
			success: function(data) {
				Swal.fire({
					position: 'center',
					type: 'success',
					title: 'Berhasil Mengubah Data',
					showConfirmButton: false,
					timer: 1500
				}).then(function() {
					location.reload();
				});
			},
			error: function(e) {
				Swal.fire({
					position: 'center',
					type: 'warning',
					title: 'Terjadi kesalahan',
					showConfirmButton: false,
					timer: 1500
				});
				console.log(e);
			}
		});
	 }
</script>

@endsection