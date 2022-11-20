@extends('layouts.main')

@section('title', 'Tambah Tujuan')

@section('activeDistribusi', 'active')

@section('content')
<div class="row">
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

                            <label for="qty">Qty</label>
                            <input type="number" class="form-control" name="qty" id="qty">
                            @if($errors->has('qty'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('qty') }}</strong></p>
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