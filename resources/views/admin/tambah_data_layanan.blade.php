@extends('layouts.adminlayout')
@section('content')


<div class="head-title">
    <div class="left">
        <h1>{{ $title }}</h1>
    </div>
</div>


@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif



@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- id	nama_alat	deskripsi_layanan	harga_layanan	kategori_id	gambar	created_at	updated_at	
 -->
<div class="container box-white">
    <form action="{{ url('/tambah_data_layanan/store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Alat</label>
            <input type="text" class="form-control" name="nama_alat" id="exampleFormControlInput1"
                placeholder="Sebutkan nama Alatnya">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Layanan</label>
            <textarea class="form-control" name="deskripsi_layanan" id="exampleFormControlTextarea1"
                placeholder="deskripsikan layanan nya !" rows="5"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga Alat</label>
            <input type="text" class="form-control" name="harga_layanan" id="exampleFormControlInput1"
                placeholder="Sebutkan Harga Alatnya">
        </div>
        <label for="exampleFormControlInput1" class="form-label">Kategori </label>
        <select name="kategori_id" class="form-select" aria-label="Default select example">
            <option value="" selected disabled hidden>Choose here</option>
            @foreach($kategori as $ktgr)
            <option value="{{ $ktgr->id }}">{{ $ktgr->nama_kategori }}</option>
            @endforeach
        </select>
        <div id="badgeContainer" class="d-flex flex-wrap"></div>
        <div class="col-sm-5 mb-2">
            <div class="text-center">
                <img class="img-preview img-fluid">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="image" class="form-label required-field">Gambar</label>
                <input name="gambar" class="form-control" type="file" id="image" onchange="previewImage()">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>





<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    function previewImage() {
        const image = document.querySelector("#image");
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>


@endsection