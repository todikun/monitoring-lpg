@extends('layouts.main')

@section('title', 'Tambah Barang Masuk')

@section('activeBarang', 'active')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('barang.store')}}" method="POST">
                            @csrf

                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" required>
                            @if($errors->has('jumlah'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('jumlah') }}</strong></p>
                            @endif

                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required>
                            @if($errors->has('tanggal'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('tanggal') }}</strong></p>
                            @endif

                            <div class="form-footer">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-xs btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
