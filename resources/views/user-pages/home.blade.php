@extends('user-pages/layout')

@section('title', 'Bantuan | LMS')

<style>
  .beranda {
    height: auto;
  }
</style>

@section('content')
<div class="container-fluid">
  <div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{!! nl2br($content['beranda']['title']) !!}</strong></h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area beranda">
              <p>{!! nl2br($content['beranda']['welcome']) !!}</p> <br>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
</div>


@endsection