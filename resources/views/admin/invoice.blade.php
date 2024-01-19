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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($belumTerbayar as $belum)
                <tr>
                    <td>{{ $belum->user_id }}</td>
                    <td>{{ $belum->transaksi_data }}</td>
                    <td>{{ $belum->tanggal_pesan }}</td>
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