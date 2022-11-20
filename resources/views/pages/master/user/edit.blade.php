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
                        <form action="{{ route('user.update', $data->id)}}" method="POST">
                            @csrf
                            @method('patch')

                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                            @if($errors->has('name'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('name') }}</strong></p>
                            @endif

                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username"  value="{{ $data->username }}"
                                required>
                            @if($errors->has('username'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('username') }}</strong></p>
                            @endif

                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                            @if($errors->has('password'))
                            <p class="text-danger mb-3"><strong>{{ $errors->first('password') }}</strong></p>
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
