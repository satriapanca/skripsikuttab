@extends('app')

@section('title', 'Kuttab Al-Fatih Malang')

@section('contents')
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><a href="{{ route('pengajar.index') }}">Pengajar</a></h3>
          <p>______________</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><a href="{{ route('santri.index') }}">Santri</a></h3>
          <p>______________</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
      </div>
    </div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><a href="{{ route('kelas.index') }}">Kelas</a></h3>
          <p>______________</p>
        </div>
        <div class="icon">
          <i class="fa fa-building-o"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><a href="{{ route('kategori.index') }}">Kategori</a></h3>
          <p>______________</p>
        </div>
        <div class="icon">
          <i class="fa fa-map-o"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><a href="{{ route('pelajaran.index') }}">Pelajaran</a></h3>
          <p>______________</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><a href="{{ route('jenis.index') }}">Jenis Bayar</a></h3>
          <p>______________</p>
        </div>
        <div class="icon">
          <i class="fa fa-map"></i>
        </div>
      </div>
    </div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><a href="{{ route('pembayaran.index') }}">Pembayaran</a></h3>
          <p>______________</p>
        </div>
        <div class="icon">
          <i class="fa fa-cart-plus"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><a href="{{ route('kas.index') }}">Kas</a></h3>
          <p>______________</p>
        </div>
        <div class="icon">
          <i class="fa fa-suitcase"></i>
        </div>
      </div>
    </div>


@endsection
