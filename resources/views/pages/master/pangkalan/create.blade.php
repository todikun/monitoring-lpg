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
                            <input type="text" class="form-control" name="nama" required>
                            @if($errors->has('nama'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('nama') }}</strong></p>
                            @endif

                            <label for="nohp">No.Hp</label>
                            <input type="text" class="form-control" name="nohp" required>
                            @if($errors->has('nohp'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('nohp') }}</strong></p>
                            @endif

                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control" name="alamat"></textarea>
                            @if($errors->has('alamat'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('alamat') }}</strong></p>
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