@extends('layouts.main')

@section('title', 'List Jadwal')

@section('activeJadwal', 'active')

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
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
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
                                        <span class="label label-success">{{ $data->status}} </span>
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