@extends('layouts.main')

@section('title', 'Detail Distribusi')

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
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pangkalan</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->pangkalan->nama }}</td>
                                    <td>{{ $item->qty }}</td>
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