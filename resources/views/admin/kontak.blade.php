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
                    <th>Nama</th>
                    <th>Nomor Telfon</th>
                    <th>Email</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>
                @foreach($kontakModel as $kontak)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $kontak->nama }}</td>
                    <td>{{ $kontak->nomor }}</td>
                    <td>{{ $kontak->email }}</td>
                    <td>{{ $kontak->pesan }}</td>
                    <td>
                        <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST"
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