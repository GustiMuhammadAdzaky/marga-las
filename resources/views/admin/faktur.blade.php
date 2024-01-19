@extends('layouts.adminlayout')
@section('content')

<div class="head-title">
    <div class="left">
        <h1>{{ $title }}</h1>
    </div>
</div>




<div class="container box-white">
    <form action="{{ route('faktur.store.admin'); }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">No Invoice</label>
            <input type="text" class="form-control" value="{{ $noInvoice }}" name="no_invoice"
                id="exampleFormControlInput1" required placeholder="Masukan Nomor Invoice">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Customer</label>
            <input type="text" class="form-control" name="nama_customer" id="exampleFormControlInput1" required
                placeholder="Masukan Nama Customer">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tipe Pembayaran</label>
            <input type="text" class="form-control" name="tipe_pembayaran" id="exampleFormControlInput1" required
                placeholder="Masukan Tipe Pembayaran">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Layanan</label>
            <input type="text" class="form-control" name="nama_layanan" id="exampleFormControlInput1" required
                placeholder="Masukan Nama Layanan">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" id="exampleFormControlInput1" required
                placeholder="Masukan Quantity">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Total</label>
            <input type="text" class="form-control" name="total" id="exampleFormControlInput1" required
                placeholder="Masukan Total Biaya Yag harus dibayar">
        </div>
        <button type="submit" class="btn btn-primary">Cetak Faktur</button>
    </form>
</div>








@endsection