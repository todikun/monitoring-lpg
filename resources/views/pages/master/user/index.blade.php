@extends('layouts.main')

@section('title', 'User')

@section('activeMaster', 'active')

@section('user', 'alert alert-success')

@section('content')
<div class="row">

    @if (session('status'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong>{{ session('status') }}</strong>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
    @endif

    <div class="col-xs-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('pangkalan.create') }}" class="btn btn-xs btn-primary ml-3"><i
                        class="fa fa-plus"></i></a>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->role }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', $data->id) }}" class="btn btn-xs btn-warning"><i
                                                class="fa fa-edit"></i></a>

                                        @if ($data->role != 'Admin')
                                        <form action="{{ route('user.destroy', $data->id)}}" style="display: inline;"
                                            method="POST" onclick="return confirm('Apakah User ini akan dihapus?')">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif

                                    </td>
                                </tr>
                                @empty
                                <td colspan="4" class="text-center">No record</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
