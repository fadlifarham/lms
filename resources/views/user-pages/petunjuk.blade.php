@extends('user-pages/layout')

@section('content')

<div class="container-fluid">
  <div class="container-fluid">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb" style="font-size: 10pt;">
            <li class="breadcrumb-item"><a>Bantuan</a></li>
          </ol>
      </nav>
    <!-- Content Row -->
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{!! nl2br($content['petunjuk']['title']) !!}</strong></h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart area">
                <p><b>Petunjuk Penggunaan :</b></p>
                <p>{!! nl2br($content['petunjuk']['petunjuk']) !!}</p>
            </div>
          </div>
        </div>
      </div>
  </div>


@endsection