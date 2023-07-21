@extends('user-pages/layout')

@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 10pt;">
              <li class="breadcrumb-item active"><a>Validasi Pembayaran</a></li>
            </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Validasi Pembayaran Tiket</h6>
        </div>
        <div class="card-body">
                {{-- {{ $purchases }} --}}
                
                <div class="table-responsive w-100 col-12">
                    <table class="table table-bordered w-100 col-12">
                        <thead>
                        <tr>
                            <th style="width: 1%">ID</th>
                            <th>Nama User</th>
                            <th>Judul Module</th>
                            <th>Jumlah Module</th>
                            <th>Harga Module</th>
                            <th>Total Pembayaran</th>
                            <th style="width: 20%">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($purchases->count() == 0)
                                <tr>
                                    <td colspan="7" class="text-center">Tidak Ada Pembelian</td>
                                </tr>
                            @else
                                @foreach ($purchases as $item)
                                    {{-- {{ $item }} --}}
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->module->name }}</td>
                                        <td>{{ $item->total_ticket }}</td>
                                        <td>Rp{{ number_format($item->price,0, ',' , '.') }}</td>
                                        <td>Rp{{ number_format(($item->total_ticket * $item->price),0, ',' , '.') }}</td>
                                        <td>
                                            @if($item->status == 0)  
                                            <div class="form-group">
                                                <form class="form" action="{{ route('validate-payment') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $item->id }}"/>
                                                    <button type="submit" name="action" value="terima" class="btn btn-success">Validasi</button>
                                                    {{-- <button type="submit" name="action" value="tolak" class="btn btn-danger">Tolak</button> --}}
                                                </form>
                                            </div>
                                            @else
                                            <i class="fa fa-check"></i> Tervalidasi
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>

@endsection