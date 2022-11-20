@extends('layouts.main')

@section('title', 'Tambah Draft Pengiriman')

@section('activeDistribusi', 'active')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('distribusi.store')}}" method="POST">
                            @csrf

                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                            @if($errors->has('jumlah'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('jumlah') }}</strong></p>
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