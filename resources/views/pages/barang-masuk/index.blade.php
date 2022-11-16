@extends('layouts.main')

@section('title', 'Item Masuk')

@section('activeBarang', 'active')


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
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
    @endif

    <div class="col-xs-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('barang.create') }}" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->jumlah}} </td>
                                    <td>{{ Carbon\Carbon::parse($data->tanggal)->format('d M Y') }} </td>
                                    <td>
                                        <a href="{{ route('barang.edit', $data->id) }}"
                                            class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>

                                        <form action="{{ route('barang.destroy', $data->id)}}" style="display: inline;"
                                            method="POST"
                                            onclick="return confirm('Apakah Item masuk ini akan dihapus?')">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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