@extends('layouts.main')

@section('title', 'Dashboard')

@section('activeDashboard', 'active')

@section('content')
<div class="row">

  @if (session('status'))
  <div class="col-md-12">
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
          aria-hidden="true">×</span></button>
      <strong>{{ session('status') }}</strong>
    </div>
  </div>
  @endif

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a class="card card-banner card-green-light">
      <div class="card-body">
        <i class="icon fa fa-tint fa-4x"></i>
        <div class="content">
          <div class="title">Stok</div>
          <div class="value"><span class="sign"></span>{{ $stok }}</div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a class="card card-banner card-blue-light">
      <div class="card-body">
        <i class="icon fa fa-home fa-4x"></i>
        <div class="content">
          <div class="title">Pangkalan</div>
          <div class="value"><span class="sign"></span>{{ $pangkalan }}</div>
        </div>
      </div>
    </a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <a class="card card-banner card-yellow-light">
      <div class="card-body">
        <i class="icon fa fa-truck fa-4x"></i>
        <div class="content">
          <div class="title">Pengiriman hari ini</div>
          <div class="value"><span class="sign"></span>{{ $distribusi }}</div>
        </div>
      </div>
    </a>
  </div>
</div>

@endsection