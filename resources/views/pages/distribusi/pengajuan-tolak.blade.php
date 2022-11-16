@extends('layouts.main')

@section('title', 'Tolak Pengajuan')

@section('activeDistribusi', 'active')

@section('pengajuan', 'alert alert-success')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('manajer.deniedAction', $data->id)}}" method="POST">
                            @csrf
                            @method('patch')

                            <label for="jumlah">Kode Transaksi</label>
                            <input type="text" class="form-control" name="kode_trx" value="{{ $data->kode_trx }}"
                                disabled>

                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" cols="30" rows="10"></textarea>
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