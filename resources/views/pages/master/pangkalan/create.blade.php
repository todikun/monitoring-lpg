@extends('layouts.main')

@section('title', 'Tambah Pangkalan')

@section('activeMaster', 'active')

@section('pangkalan', 'alert alert-success')

@section('content')
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('pangkalan.store')}}" method="POST">
                            @csrf

                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                            <label for="nohp">No.Hp</label>
                            <input type="text" class="form-control" name="nohp" id="nohp" required>
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control" name="alamat" id="alamat"></textarea>
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