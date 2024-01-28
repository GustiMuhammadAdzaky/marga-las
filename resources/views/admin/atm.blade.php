@extends('layouts.adminlayout')
@section('content')




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
        <form action="{{ route('atm.store'); }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="no_rek" class="form-label">No Rek</label>
                <input type="text" name="no_rek" class="form-control" value="{{ $noRek }}" id="no_rek"
                    aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>

    </div>
</div>


@endsection