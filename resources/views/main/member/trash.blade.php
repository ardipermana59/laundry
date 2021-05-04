@extends('layouts.admin.master')
@section('title','Daftar Member')
@section('page-title','Member')
@section('breadcrumb','member')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

<section class="content">
      <div class="mb-3">
        <a href="{{ route('member.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>&nbspback</a>
      </div>

      <livewire:member.trash></livewire:member.trash>

    </section>

@endsection
