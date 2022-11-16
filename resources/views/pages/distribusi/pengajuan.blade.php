@extends('layouts.main')

@section('title', 'List Distribusi')

@section('activeDistribusi', 'active')

@section('pengajuan', 'alert alert-success')

@section('content')
<div class="row">


    @if (session('status'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="trues">×</span></button>
            <strong>{{ session('status') }}</strong>
        </div>
    </div>
    @endif

    @if (session('error'))
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="trues">×</span></button>
            <strong>{{ session('error') }}</strong>
        </div>
    </div>
    @endif

    <div class="col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Keterangan</th>
                                    <th>Surat Jalan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @forelse ($distribusi as $data )
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode_trx }}</td>
                                    <td>{{ $data->created_at->format('d M Y') }}</td>
                                    <td>
                                        @switch($data->status)
                                        @case('Disetujui')
                                        <span class="label label-success">{{ $data->status}} </span>
                                        @break
                                        @case('Ditolak')
                                        <span class="label label-danger">{{ $data->status}} </span>
                                        @break
                                        @case('Diajukan')
                                        <span class="label label-warning">{{ $data->status}} </span>
                                        @break
                                        @default
                                        <span class="label label-default">{{ $data->status}} </span>
                                        @endswitch
                                    </td>
                                    <td>


                                        @if ($data->status == 'Diajukan')
                                        <form action="{{ route('manajer.accepted', $data->id) }}"
                                            style="display: inline-block;" method="POST">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" class="form-control" name="kode_trx"
                                                value="{{ $data->kode_trx}}">

                                            <button title="Ajukan" type="submit" class="btn btn-xs btn-success"
                                                onclick="return confirm('Apakah yakin pengiriman ini disetujui ?')">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('manajer.denied', $data->id)}}" class="btn btn-xs btn-danger">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                        @else
                                        <strong>-</strong>
                                        @endif

                                    </td>
                                    <td>
                                        <strong>{{ $data->keterangan }}</strong>
                                    </td>
                                    <td>
                                        <a href="{{ route('surat', $data->id) }}" target="_blank"
                                            class="btn btn-xs btn-primary">
                                            <i class="fa fa-envelope"></i>
                                        </a>
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