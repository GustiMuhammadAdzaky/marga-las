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
            <a href="/tambah_data_kategori_layanan"><button type="button" class="btn btn-primary">Tambah
                    Data</button></a>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori Layanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>
                @foreach($kategoriLayanan as $kategori)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('kategori_layanan.edit', $kategori->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('kategori_layanan.destroy', $kategori->id) }}" method="POST"
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