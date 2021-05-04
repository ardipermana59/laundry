@extends('layouts.admin.master')
@section('title','Daftar Member')
@section('page-title','Member')
@section('breadcrumb','member')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

<section class="content">
      <div class="clearfix mb-2">
        <div class="float-right">
          <a href="{{ route('member.trash') }}" class="btn btn-info"><i class="fas fa-trash"></i>&nbsp&nbspSampah</a>
        </div>
      </div>
      <livewire:member.index></livewire:member.index>

    </section>

@endsection
