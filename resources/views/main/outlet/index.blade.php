@extends('layouts.admin.master')
@section('title','Daftar Outlet')
@section('page-title','Outlet')
@section('breadcrumb','outlet')

@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@php
  $no = $outlets->firstItem()
@endphp

@section('content')
  <section class="content">
    <div class="clearfix mb-2">
      <div class="float-right">
        <a href="{{ route('outlet.trash') }}" class="btn btn-info"><i class="fas fa-trash"></i>&nbsp&nbspSampah</a>
      </div>
    </div>
    <livewire:outlet.index></livewire:outlet.index>
  </section>
@endsection
