@extends('layouts.admin.master')
@section('title','Daftar Member')
@section('page-title','Member')
@section('breadcrumb','member')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

<section class="content">

  <livewire:member.index></livewire:member.index>

</section>

@endsection
