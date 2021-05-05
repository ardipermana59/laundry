@extends('layouts.admin.master')
@section('title','Daftar Outlet')
@section('page-title','Outlet')
@section('breadcrumb','outlet')

@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@section('content')
  <section class="content">
    
    <livewire:outlet.index></livewire:outlet.index>
  </section>
@endsection
