@extends('layouts.main')

@section('title', 'Edit Pangkalan')

@section('activeMaster', 'active')

@section('pangkalan', 'alert alert-success')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('pangkalan.update', $data->id)}}" method="POST">
                            @csrf
                            @method('patch')

                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ $data->nama }}"
                                required>
                            <label for="nohp">No.Hp</label>
                            <input type="text" class="form-control" name="nohp" id="nohp" value="{{ $data->nohp }}"
                                required>
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control" name="alamat" id="alamat"
                                required>{{ $data->alamat }}</textarea>
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