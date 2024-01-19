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
        <li>{{ $error }}</li>`
        @endforeach
    </ul>
</div>
@endif

<!-- id	nama_alat	deskripsi_layanan	harga_layanan	kategori_id	gambar	created_at	updated_at	-->
<div class="container box-white">
    <form action="galeri_admin/store" enctype="multipart/form-data" method="POST">
        @csrf
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