@extends('layouts.adminlayout')
@section('content')


<div class="head-title">
    <div class="left">
        <h1>{{ $title }}</h1>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



<div class="container box-white">
    <form action="/tambah_data_katogri_layanan/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" name="nama_kategori" id="exampleFormControlInput1"
                placeholder="Sebutkan nama Kategori nya">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>








@endsection