@extends('layouts.admin.master')
@section('title','Daftar Paket')
@section('page-title','Paket')
@section('breadcrumb','paket')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

<section class="content">
      <livewire:paket.index></livewire:paket.index>
</section>

@endsection
