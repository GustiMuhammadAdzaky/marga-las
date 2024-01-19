@extends('layouts.adminlayout')
@section('content')




<div class="head-title">
    <div class="left">
        <h1>{{ $title }}</h1>
    </div>
</div>
<div class="table-data">
    <div class="order">
        <table>
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Transaksi </th>
                            <th>Nama Peneransfer</th>
                            <th>Foto Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($transferModel as $transfer)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $transfer->transaksi_id }}</td>
                            <td>{{ $transfer->nama_pembeli }}</td>
                            <td>
                                <img src="{{ asset('storage/transfer/' . basename($transfer->gambar)) }}" alt="">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </table>
    </div>
</div>



@endsection