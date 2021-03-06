@extends('layouts.admin.master')
@section('title','Edit data Member')
@section('page-title','Edit Data Member')
@section('breadcrumb','member')

@section('content')
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit data Member</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('member.update',['member' => $member->id]) }}">
              	@csrf
              	@method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="nama lengkap ..." value="{{ $member->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="L" @if ($member->gender == 'L') {{ 'selected' }} @endif>Laki - laki</option>
                      <option value="P" @if ($member->gender == 'P') {{ 'selected' }} @endif>Perempuan</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="tlp">Nomor Telpon</label>
                    <input type="number" class="form-control @error('tlp') is-invalid @enderror" id="tlp" name="tlp" placeholder="081222333444" value="{{ $member->tlp }}">
                    @error('tlp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat Lengkap</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Alamat lengkap ..." name="address" id="address">{{ $member->address }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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