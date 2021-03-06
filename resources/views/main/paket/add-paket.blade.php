@extends('layouts.admin.master')
@section('title','Tambah Paket')
@section('page-title','Tambah Paket')
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
                <h3 class="card-title">Tambah Paket</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('paket.store') }}">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Outlet</label>
                      <select name="outlet_id" class="form-control @error('outlet_id') is-invalid @enderror">
                        <option value="">Pilih Outlet</option>
                    @forelse($outlets as $outlet)
                        <option value="{{ $outlet->id }}" @if( old('outlet_id') == $outlet->id ) {{ 'selected' }} @endif>{{ $outlet->name }}</option>
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
                      <option value="">Pilih type Paket</option>
                      <option value="kiloan" @if (old('type') == 'kiloan') {{ 'selected' }} @endif>Kiloan</option>
                      <option value="selimut" @if (old('type') == 'selimut') {{ 'selected' }} @endif>Selimut</option>
                      <option value="bed_cover" @if (old('type') == 'bed_cover') {{ 'selected' }} @endif>Bed Cover</option>
                      <option value="kaos" @if (old('type') == 'kaos') {{ 'selected' }} @endif>Kaos</option>
                      <option value="lain" @if (old('type') == 'lain') {{ 'selected' }} @endif>Lain - lain</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="packet_name">Nama Paket</label>
                    <input type="text" name="packet_name" class="form-control @error('packet_name') is-invalid @enderror" placeholder="nama paket ..." value="{{ old('packet_name')}}">
                    @error('packet_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="cost">Biaya</label>
                    <input type="number" name="cost" class="form-control" id="cost" placeholder="0">
                    @error('cost')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
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