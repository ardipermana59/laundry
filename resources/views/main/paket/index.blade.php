@extends('layouts.admin.master')
@section('title','Daftar Paket')
@section('page-title','Paket')
@section('breadcrumb','paket')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

<section class="content">
      <div class="clearfix mb-2">
        <div class="float-right">
          <a href="{{ route('paket.trash') }}" class="btn btn-info"><i class="fas fa-trash"></i>&nbsp&nbspSampah</a>
        </div>
      </div>
      <livewire:paket.index></livewire:paket.index>

    </section>

@endsection
