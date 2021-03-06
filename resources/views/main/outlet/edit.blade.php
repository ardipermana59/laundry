@extends('layouts.admin.master')
@section('title','Edit data Outlet')
@section('page-title','Edit Data Outlet')
@section('breadcrumb','outlet')

@section('content')
	  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit data outlet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('outlet.update', ['outlet' => $outlet->id]) }}">
              	@csrf
                @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Outlet</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="nama outlet ..." value="{{ $outlet->name }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="tlp">Nomor Telpon</label>
                    <input type="number" class="form-control @error('tlp') is-invalid @enderror" id="tlp" name="tlp" placeholder="081222333444" value="{{ $outlet->tlp  }}" required>
                    @error('tlp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat Outlet</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Alamat lengkap ..." name="address" id="address" required>{{ $outlet->address }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                <!-- /.card-body -->
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