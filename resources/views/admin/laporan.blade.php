@extends('layouts.adminlayout')

@section('content')

<div class="table-data">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ $title }}</h1>
            </div>
        </div>
        <div class="row mt-3">
            <form action="{{ route('laporan.admin') }}" method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="tanggal_awal" class="form-label">Tanggal Awal:</label>
                        <input type="date" name="tanggal_awal" class="form-control"
                            value="{{ request('tanggal_awal') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir:</label>
                        <input type="date" name="tanggal_akhir" class="form-control"
                            value="{{ request('tanggal_akhir') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary mt-4">Filter</button>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('laporan.view.pdf', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}"
                            class="btn btn-success">Cetak Transaksi</a>
                    </div>
                </div>
            </form>
        </div>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Id Pembeli</th>
                    <th>Data Transaksi</th>
                    <th>Status Pemesanan</th>
                    <th>Total harga</th>
                    <th>Tanggal Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalKeuntungan = 0; // Inisialisasi total keuntungan
                @endphp
                @foreach($laporan as $lpr)
                <tr>
                    <td>{{ $lpr->user_id }}</td>
                    <td>{{ $lpr->transaksi_data }}</td>
                    <td>{{ $lpr->status }}</td>
                    <td>{{ 'Rp ' . number_format($lpr->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $lpr->tanggal_pesan }}</td>

                    <!-- Tambahkan nilai total_harga ke totalKeuntungan -->
                    @php
                    $totalKeuntungan += $lpr->total_harga;
                    @endphp
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td> <!-- Kolom kosong untuk offset pada kolom keuntungan -->
                    <td class="text-end"><strong>Total Keuntungan:</strong></td>
                    <td>{{ 'Rp ' . number_format($totalKeuntungan, 0, ',', '.') }}</td>
                    <td></td> <!-- Kolom kosong untuk offset pada kolom keuntungan -->
                </tr>
            </tfoot>
        </table>



        <div class="pagination justify-content-center mt-4">
            @if ($laporan->lastPage() > 1)
            <ul class="pagination">
                <li class="page-item {{ ($laporan->currentPage() == 1) ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $laporan->url(1) }}" aria-label="First">
                        <span aria-hidden="true">&laquo;&laquo;</span>
                    </a>
                </li>
                @for ($i = 1; $i <= $laporan->lastPage(); $i++)
                    <li class="page-item {{ ($laporan->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $laporan->url($i) }}">{{ $i }}</a>
                    </li>
                    @endfor
                    <li class="page-item {{ ($laporan->currentPage() == $laporan->lastPage()) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $laporan->url($laporan->lastPage()) }}" aria-label="Last">
                            <span aria-hidden="true">&raquo;&raquo;</span>
                        </a>
                    </li>
            </ul>
            @endif
        </div>



    </div>
</div>

@endsection