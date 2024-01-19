@extends('layouts.adminlayout')


@section('content')

<div class="head-title">
    <div class="left">
        <h1>{{ $title }}</h1>
    </div>
</div>
<div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Kelola Layanan</h3>
            <a href="/tambah_data_layanan"><button type="button" class="btn btn-primary">Tambah Data</button></a>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Nama Alat</th>
                    <th>Deskripsi Produk</th>
                    <th>Harga Layanan</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($LayananModel as $layanan)
                <tr>
                    <td>{{ $layanan->nama_alat }}</td>
                    <td>{{ $layanan->deskripsi_layanan }}</td>
                    <td>{{ $layanan->harga_layanan }}</td>
                    <td>{{ optional($layanan->kategori)->nama_kategori }}</td>
                    <td>
                        <img src="{{ asset('storage/gambar/' . basename($layanan->gambar)) }}" alt="">
                    </td>
                    <td>
                        <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection