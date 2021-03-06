@extends('layouts.admin.master')
@section('title','Tambah data Transaksi')
@section('page-title','Tambah Data Transaksi')
@section('breadcrumb','transaksi')

@section('content')
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('transaksi.store') }}" class="form-horizontal">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="outlet_id">Nama Outlet</label>
                      <select class="form-control @error('outlet_id') is-invalid @enderror" name="outlet_id" id="outlet_id">
                        @forelse($outlets as $outlet)
                          <option value="{{ $outlet->id }}" @if ( old('outlet_id') == $outlet->id) {{ 'selected' }} @endif>{{ $outlet->name }} </option>
                        @empty
                        @endforelse
                      </select>
                    @error('outlet_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="member_id">Nama Member</label>
                      <select class="form-control @error('member_id') is-invalid @enderror" name="member_id" id="member_id">
                          <option value="">Pilih Member</option>
                        @forelse($members as $member)
                          <option value="{{ $member->id }}" @if ( old('member_id') == $member->id) {{ 'selected' }} @endif>{{ $member->name }} </option>
                        @empty
                        @endforelse
                      </select>
                    @error('member_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="row">
                    <div class="form-group col-4">
                      <label for="tax">Pajak</label>
                      <input type="number" class="form-control @error('tax') is-invalid @enderror" id="tax" name="tax" placeholder="0%" value="0">
                      @error('tax')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group col-4">
                      <label for="discon">Diskon <span class="text-muted">%</span></label>
                      <input type="number" class="form-control @error('discon') is-invalid @enderror" id="discon" name="discon" placeholder="0%" value="0">
                      @error('discon')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group col-4">
                      <label for="cost_additional">Biaya Tambahan</label>
                      <input type="number" class="form-control @error('cost_additional') is-invalid @enderror" id="cost_additional" name="cost_additional" placeholder="biaya tambahan" value="0">
                      @error('cost_additional')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-4">
                      <label for="packet_id">Paket</label>
                      <select class="form-control @error('packet_id') is-invalid @enderror" name="packet_id" id="packet_id">
                          <option value="">Pilih Paket</option>
                        @forelse($pakets as $paket)
                          <option value="{{ $paket->id }}" @if ( old('packet_id') == $paket->id) {{ 'selected' }} @endif>{{ $paket->type . '/' . $paket->packet_name }} </option>
                        @empty
                        @endforelse
                      </select>
                      @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group col-4">
                      <label for="status">Status</label>
                      <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="">Pilih Status Pengerjaan</option>
                        <option value="baru" @if ( old('status') == 'baru') {{ 'selected' }} @endif>Baru</option>
                        <option value="proses" @if ( old('status') == 'proses') {{ 'selected' }} @endif>Proses</option>
                        <option value="selesai" @if ( old('status') == 'selesai') {{ 'selected' }} @endif>Selesai</option>
                        <option value="diambil" @if ( old('status') == 'diambil') {{ 'selected' }} @endif>Diambil</option>
                      </select>
                      @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group col-4">
                      <label for="paid">Pembayaran</label>
                      <select class="form-control @error('paid') is-invalid @enderror" name="paid" id="paid">
                        <option value="">Pilih Status Pembayaran</option>
                        <option value="dibayar" @if ( old('paid') == 'dibayar') {{ 'selected' }} @endif>Dibayar</option>
                        <option value="belum_dibayar" @if ( old('paid') == 'belum_dibayar') {{ 'selected' }} @endif>Belum Dibayar</option>
                      </select>
                      @error('paid')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
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