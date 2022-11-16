@extends('layouts.main')

@section('title', 'Tambah Tujuan')

@section('activeDistribusi', 'active')

@section('itemKeluar', 'active')

@section('content')


<div class="row">

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
            <div class="card-header">
                <div class="content">
                    <button type="button" class="btn btn-default btn-lg">{{ $distribusi->kode_trx }}</button>
                    <input type="hidden" id="distribusi_id" value="{{$distribusi->id}}">
                    <div class="value">Tanggal <span class="sign"><strong>{{
                                Carbon\Carbon::parse($distribusi->tanggal)->format('d M Y') }}
                            </strong>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <a title="Tambah tujuan" href="{{ route('distribusi.tujuan.create', $distribusi->id) }}"
                    class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>

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
                                        <form action="{{ route('distribusi.tujuan.destroy', $item->id)}}" method="POST"
                                            onclick="return confirm('Apakah tujuan ini akan dihapus?')">
                                            @csrf
                                            @method('delete')

                                            <input type="hidden" name="distribusi_id" value="{{ $distribusi->id }}">
                                            <button class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <td colspan="4" class="text-center">Belum ada tujuan!</td>
                                @endforelse
                            </tbody>
                        </table>


                        <a title="Simpan tujuan" href="{{ route('distribusi.submit', $distribusi->id) }}"
                            class="btn btn-xs btn-success"><i class="fa fa-send"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection