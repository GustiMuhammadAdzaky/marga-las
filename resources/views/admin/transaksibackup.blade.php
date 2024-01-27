@extends('layouts.adminlayout')


@section('content')


<?php 




; ?>



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

                    <th class="text-center">Id Pemesan </th>
                    <th class="text-center">Nama Pemesan</th>
                    <th class="text-center">Transaksi Data</th>
                    <th class="text-center">Status Pembelian</th>
                    <th class="text-center">Total Harga</th>
                    <th class="text-center">Tanggal Pemesanan</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Tipe Pemayaran</th>
                    <th class="text-center">Hubungi di Whatsapp</th>
                    <th class="text-center">Bukti Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksiModels as $index => $transaksiModel)
                <tr>
                    <td>{{ $transaksiModel->user_id }}</td>
                    <td>
                        @if($transaksiModel->user)
                        {{ $transaksiModel->user->name }}
                        @else
                        User Tidak Ditemukan
                        @endif
                    </td>


                    <td>
                        {{ $transaksiModel->transaksi_data }}
                    </td>
                    <!-- {{ $transaksiModel->id }} -->
                    <td>
                        <form id="formUbahStatus" action="{{ url('/update-status') }}" method="POST">
                            @csrf
                            <input type="hidden" name="transaksiId" value="{{ $transaksiModel->id }}">
                            <select style="width: auto;" class="form-select display form-select-sm"
                                aria-label=".form-select-sm example" name="selectedStatus">
                                @foreach(['belum_terbayar', 'terbayar'] as $statusOption)
                                <option value="{{ $statusOption }}" {{ $transaksiModel->status === $statusOption ?
                                    'selected' : '' }}>
                                    {{ ucfirst(str_replace('_', ' ', $statusOption)) }}
                                </option>
                                @endforeach
                            </select>
                            <button type="submit" style="display: inline-block;" class="btn btn-warning">ubah data
                                status</button>
                        </form>
                    </td>

                    <td>{{ $transaksiModel->total_harga }}</td>
                    <td>{{ $transaksiModel->tanggal_pesan }}</td>
                    <td>
                        <button type="button"
                            onclick="keterangan({{ $transaksiModel->id }}, '{{ $transaksiModel->keterangan }}')"
                            class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Keterangan
                        </button>

                    </td>
                    <td>Transfer</td>
                    <td>
                        <a href="https://api.whatsapp.com/send?phone={{ $transaksiModel->user->nomor }}"><button
                                class="btn btn-success">Whattapp</button></a>
                    </td>
                    <td>
                        @if($transaksiModel->gambar == null)
                        <span class="badge bg-danger">Belum Transfer</span>
                        @else
                        <a href="{{ asset('storage/transfer/' . basename($transaksiModel->gambar)) }}"><img
                                src="{{ asset('storage/transfer/' . basename($transaksiModel->gambar)) }}" alt=""></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('keterangan.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan</label>
                        <input id="id_keterangan" name="id" type="hidden">
                        <textarea class="form-control" id="keteranganTextarea" name="keterangan" rows="3"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Keterangan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>


    function keterangan(id, keterangan) {
        document.getElementById("id_keterangan").value = id;
        document.getElementById("keteranganTextarea").value = keterangan;
    }

    $(document).ready(function () {
        // Mendengarkan submit pada form "formUbahStatus"
        $('#formUbahStatus').on('submit', function (event) {
            event.preventDefault(); // Mencegah perilaku default pengiriman form

            // Mendapatkan nilai dari dropdown
            var selectedStatus = $('select[name="selectedStatus"]').val();

            // Mendapatkan ID transaksi (harus disesuaikan dengan logika Anda)
            var transaksiId = '{{ $transaksiModel->id }}';

            // Mengirim permintaan AJAX ke server untuk memperbarui status
            $.ajax({
                type: 'POST',
                url: '/update-status', // Sesuaikan dengan rute Anda
                data: {
                    _token: '{{ csrf_token() }}',
                    transaksiId: transaksiId,
                    selectedStatus: selectedStatus
                },
                success: function (data) {
                    // Tindakan yang perlu dilakukan setelah pembaruan status berhasil
                    console.log('Status berhasil diperbarui');
                    // Misalnya, Anda bisa menampilkan pesan sukses atau memperbarui tampilan lainnya
                },
                error: function (error) {
                    console.error('Gagal memperbarui status', error);
                }
            });
        });
    });
</script>

@endsection