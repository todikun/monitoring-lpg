@extends('layouts.main')

@section('title', 'Edit Item Masuk')

@section('activeMaster', 'active')

@section('itemMasuk', 'alert alert-success')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('barang.update', $barang->id)}}" method="POST">
                            @csrf
                            @method('patch')

                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah"
                                value="{{ $barang->jumlah }}" required>
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