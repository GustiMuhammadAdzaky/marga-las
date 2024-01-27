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
            <a href="/tambah_galeri"><button type="button" class="btn btn-primary">Tambah Data</button></a>
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
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($model as $mdl)
                <tr>
                    <td>
                        <img src="{{ asset('storage/galeri/' . basename($mdl->gambar)) }}" alt="">
                    </td>
                    <td>
                        <form action="{{ route('galeri.destroy', $mdl->id) }}" method="POST"
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