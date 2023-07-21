@extends('user-pages/layout')

@section('content')
{{\Auth::user()->status}}
  @if(\Auth::user()->status == 1)
  <div class="container-fluid">
      <p style="font-size: 18pt;" class=" mb-2 text-gray-800">Nama Training : {{ $name }}</p>
      <p style="font-size: 18pt;" class=" mb-2 text-gray-800">Kode Korporasi : {{ $code_corporation }}</p>
      <br>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna Dalam Training Anda</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              @if($list_user->count() == 0)
                <tr>
                  <td colspan="3" class="text-center">Tidak Ada Pengguna</td>
                </tr>
              @else
                @foreach ($list_user as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  @else
  <div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><strong>Selamat Bergabung di BisnisKita!</strong></h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <p>Terima kasih telah melakukan pendaftaran di platform kami. Bisnis kita adalah platform belajar bisnis dan finansial terlengkap di Indonesia. Di sini Anda dapat mengikuti pembelajaran lengkap dengan berbagai fasilitas mulai dari konten video hingga post test untuk menguji hasil belajar Anda. Saat ini platform ini sedang dalam pengembangan dan akan segera siap dalam beberapa hari ke depan. Nantikan segera!</p> <br>
              Salam Super,<br><br>
              Tim Bisnis Kita
            </div>
          </div>
        </div>
      </div>
		
		<!-- Content Row -->
    <div class="row">
      </div>
    </div>

  </div>
  @endif
@endsection