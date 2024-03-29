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

                    <th>Id Pemesan </th>
                    <th>Nama Pemesan</th>
                    <th>Status Pembelian</th>
                    <th>Keterangan</th>
                    <th>Hubungi di Whatsapp</th>
                    <th>Bukti Pembayaran</th>
                    <th>Informasi Lengkap</th>
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
                    <td>
                        <button type="button"
                            onclick="keterangan({{ $transaksiModel->id }}, '{{ $transaksiModel->keterangan }}')"
                            class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Keterangan
                        </button>

                    </td>
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

                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal2" data-transaksi-data="{{ $transaksiModel->transaksi_data }}"
                            data-total-harga="{{ $transaksiModel->total_harga }}"
                            data-tanggal-pesan="{{ $transaksiModel->tanggal_pesan }}"
                            data-tipe-pemayaran="{{ $transaksiModel->tipe_pembayaran }}"
                            data-gambar="{{ $transaksiModel->gambar }}" onclick="detail(this)">
                            Detail
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <td>
                    <p id="transaksi_data"></p>
                </td>
                <td>
                    <p id="total_harga"></p>
                </td>
                <td>
                    <p id="tanggal_pemesanan"></p>
                </td>
                <td>
                    <p id="tipe_pemayaran"></p>
                </td>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Keterangan</h5>
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
    function detail(button) {

        var transaksi_data = button.getAttribute('data-transaksi-data');
        var total_harga = button.getAttribute('data-total-harga');
        var tanggal_pesan = button.getAttribute('data-tanggal-pesan');
        var tipe_pemayaran = button.getAttribute('data-tipe-pemayaran');
        var bukti_pembayaran = button.getAttribute('data-gambar');

        document.getElementById("transaksi_data").innerHTML = 'Transaksi Data: ' + transaksi_data;
        document.getElementById("total_harga").innerHTML = 'Total Harga: ' + total_harga;
        document.getElementById("tanggal_pemesanan").innerHTML = 'Tanggal Pemesanan: ' + tanggal_pesan;
        document.getElementById("tipe_pemayaran").innerHTML = 'Tipe Pembayaran: ' + tipe_pemayaran;
        document.getElementById("bukti_pembayaran").innerHTML = 'Bukti Pembayaran: ' + bukti_pembayaran;
    }



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