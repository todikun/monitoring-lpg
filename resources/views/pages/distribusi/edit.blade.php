@extends('layouts.main')

@section('title', 'Edit Tujuan')

@section('activeDistribusi', 'active')

@section('itemKeluar', 'alert alert-success')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="content">
                    <button type="button" class="btn btn-default btn-lg">{{ $distribusi->kode_trx }}</button>
                    <input type="hidden" id="distribusi_id" value="{{$distribusi->id}}">
                    <div class="value">Tanggal <span class="sign"><strong>{{ $distribusi->created_at->format('d M Y')
                                }}</strong></div>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ url('distribusi/tujuan', $distribusi->id) }}" class="btn btn-xs btn-primary ml-3"><i
                        class="fa fa-plus"></i></a>

                <a title="Simpan tujuan" href="{{ route('distribusi.index') }}" class="btn btn-xs btn-success"><i
                        class="fa fa-send"></i></a>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pangkalan</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->pangkalan->nama }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>
                                        <a href="{{ url('distribusi/hapus/item', $item->id) }}"
                                            class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <td colspan="4" class="text-center">Belum ada tujuan!</td>
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