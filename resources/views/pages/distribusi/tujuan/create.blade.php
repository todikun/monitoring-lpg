@extends('layouts.main')

@section('title', 'Tambah Tujuan')

@section('activeDistribusi', 'active')

@section('content')
<div class="row">

    @if (session('error'))
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
    @endif

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('distribusi.tujuan.store')}}" method="POST">
                            @csrf

                            <input type="hidden" name="distribusi_id" value="{{ $distribusi->id }}">

                            <label for="jumlah">Pangkalan</label>
                            <select name="pangkalan_id" class="select2" tabindex="-1" aria-hidden="true">
                                <option value="">-PILIH-</option>
                                @foreach ($pangkalan as $data )
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>

                            <label for="stok">Qty</label>
                            <input type="number" class="form-control" name="qty" id="qty">

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