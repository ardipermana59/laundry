@extends('layouts.admin.master')
@section('title','Edit data Paket')
@section('page-title','Edit Data Paket')
@section('breadcrumb','paket')

@section('content')
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit data Paket</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('paket.update',['paket' => $paket->id]) }}">
              	@csrf
              	@method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="outlet_id">Nama Outlet</label>
                      <select name="outlet_id" class="form-control @error('outlet_id') is-invalid @enderror">
                        <option value="">Pilih Outlet</option>
                    @forelse($outlets as $outlet)
                        <option value="{{ $outlet->id }}" @if( $paket->outlet_id == $outlet->id ) {{ 'selected' }} @endif>{{ $outlet->name }}</option>
                    @empty
                        <option value="">Tidak ada outlet</option>
                    @endforelse
                      </select>
                    @error('outlet_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="type">Jenis Paket</label>
                    <select class="form-control @error('type') is-invalid @enderror" name="type">
                      <option value="">Pilih Jenis Paket</option>
                      <option value="kiloan" @if ( $paket->type == 'kiloan') {{ 'selected' }} @endif>Kiloan</option>
                      <option value="selimut" @if ( $paket->type == 'selimut') {{ 'selected' }} @endif>Selimut</option>
                      <option value="bed_cover" @if ( $paket->type == 'bed_cover') {{ 'selected' }} @endif>Bed Cover</option>
                      <option value="kaos" @if ( $paket->type == 'kaos') {{ 'selected' }} @endif>Kaos</option>
                      <option value="lain" @if ( $paket->type == 'lain') {{ 'selected' }} @endif>Lain - lain</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="packet_name">Nama Paket</label>
                    <input type="text" name="packet_name" class="form-control @error('packet_name') is-invalid @enderror" placeholder="nama pake ..." value="{{ $paket->packet_name }}">
                    @error('packet_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Keterangan <span class="text-muted">Optional</span class="text-muted"></label>
                    <input type="number" name="cost" value="{{ $paket->cost}}" class="form-control" id="cost" placeholder="0">

                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <!-- /.card-body -->
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('footer-script')

@endsection