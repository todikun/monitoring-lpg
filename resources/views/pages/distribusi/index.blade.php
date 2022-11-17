@extends('layouts.main')

@section('title', 'Draft Pengiriman')

@section('activeDistribusi', 'active')

@section('draftPengiriman', 'alert alert-success')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('distribusi.store') }}" method="POST">
                    @csrf

                    <button title="Tambah distribusi" type="submit" class="btn btn-xs btn-primary"><i
                            class="fa fa-plus"></i>
                    </button>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Tujuan</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Ajukan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @forelse ($distribusi as $data )
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode_trx }}</td>
                                    <td>{{ Carbon\Carbon::parse($data->tanggal)->format('d M Y') }} }}</td>
                                    <td>{{ $data->item->count()}}</td>
                                    <td>{{ $data->item->sum('qty')}}</td>
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
                                        @if ($data->status == 'Draft')
                                        <form action="{{ route('distribusi.ask', $data->id) }}"
                                            style="display: inline-block;" method="POST">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" class="form-control" name="kode_trx"
                                                value="{{ $data->kode_trx}}">

                                            <button title="Ajukan" type="submit" class="btn btn-xs btn-success"
                                                onclick="return confirm('Apakah yakin mengajukan pengiriman ini ?')">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>
                                        @else
                                        <strong>-</strong>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('distribusi.show', $data->id) }}"
                                            class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>

                                        @if ($data->status == 'Belum ada pengajuan')
                                        <a href="{{ route('distribusi.edit', $data->id) }}"
                                            class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('distribusi/detail', $data->id) }}"
                                            class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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