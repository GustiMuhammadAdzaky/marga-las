@extends('layouts.adminlayout')

@section('content')





<style>
    .display {
        display: inline-block;
    }
</style>

<div class="head-title">
    <div class="left">
        <h1>{{ $title }}</h1>
    </div>
</div>
<div class="row mt-3">
    <form action="{{ route('invoice.admin') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <label for="tanggal_awal" class="form-label">Tanggal Awal:</label>
                <input type="date" name="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
            </div>
            <div class="col-md-3">
                <label for="tanggal_akhir" class="form-label">Tanggal Akhir:</label>
                <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
            </div>
            <div class="mt-3">
                <a href="{{ route('invoice.view.pdf', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}"
                    class="btn btn-success">Cetak Transaksi</a>
            </div>
        </div>
    </form>
</div>
<div class="table-data">
    <div class="order">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>id pemesan</th>
                    <th>Data Pesanan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Tipe Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($belumTerbayar as $belum)
                <tr>
                    <td>{{ $belum->user_id }}</td>
                    <td>{{ $belum->transaksi_data }}</td>
                    <td>{{ $belum->tanggal_pesan }}</td>
                    <td>{{ $belum->tipe_pembayaran }}</td>
                    <form action="{{ route('store_invoice.admin') }}" method="post">
                        @csrf
                        <td>
                            <input type="hidden" name="user_id" value="{{ $belum->user_id }}">
                            <button class="btn btn-primary" type="submit">Kirim Invoice</button>

                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection