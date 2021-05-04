@extends('layouts.admin.master')
@section('title','Daftar Sampah Paket')
@section('page-title','Paket')
@section('breadcrumb','paket')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

<section class="content">
      <div class="mb-3">
        <a href="{{ route('paket.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>&nbspback</a>
      </div>
      <livewire:paket.trash></livewire:paket.trash>

    </section>

@endsection
