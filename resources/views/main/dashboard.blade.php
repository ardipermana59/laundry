@extends('layouts.admin.master')
@section('title','Dashboard')
@section('page-title','Dashboard')
@section('breadcrumb','dashboard')

@section('content') 

    <section class="content">

      <!-- Default box -->
      <div class="card">

        <div class="card-body text-center">
          @if( Auth::user()->role == 'admin')
            <h1>Selamat Datang <b>Admin</b></h1>
          @elseif ( Auth::user()->role == 'kasir')
            <h1>Selamat Datang <b>Kasir</b></h1>
          @else
            <h1>Selamat Datang <b>Owner</b></h1>
          @endif
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
@endsection

