@extends('layouts.main')

@section('title', 'Laporan')

@section('activeDistribusi', 'active')

@section('laporan', 'alert alert-success')

@section('content')
<div class="row">

    @if (session('status'))
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong>{{ session('status') }}</strong>
        </div>
    </div>
    @endif

    <div class="col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-4">
                    <form action="{{ route('laporan.show')}}" method="GET">
                        <label for="tanggal">Periode :</label>
                        <input type="month" class="form-control" name="tanggal" required>
                        <button type="submit" class="btn btn-xs btn-primary">
                            <i class="fa fa-print"></i>
                        </button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @forelse ($distribusi as $data )
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->kode_trx }}</td>
                                    <td>{{ Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}</td>
                                    <td>
                                        <span class="label label-success">{{ $data->status}} </span>
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