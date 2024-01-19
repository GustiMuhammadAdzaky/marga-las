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

                    <th>Id Pemesan </th>
                    <th>Nama Pemesan</th>
                    <th>Transaksi Data</th>
                    <th>Status Pembelian</th>
                    <th>Total Harga</th>
                    <th>Tanggal Pemesanan</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<script>
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