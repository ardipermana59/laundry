@extends('layouts.admin.master')
@section('title','Pengaturan')
@section('page-title','Pengaturan')
@section('breadcrumb','pengaturan')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content') 
  <section class="content">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <form method="post" action="{{ route('setting.save') }}">
                  @csrf
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="masukan name lengkap" value="{{ auth()->user()->name }}" name="name" disabled autofocus required>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="masukan username" value="{{ auth()->user()->username }}" name="username" disabled required>
                      @error('username')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-7">
                      <input type="password" class="form-control" id="password" placeholder="*******" disabled required>
                    </div>
                    <div class="col-sm-2">
                      <button id="btn-modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#changepasswordmodal">Ganti Password</button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button id="btn-edit" type="button" class="btn btn-warning">Edit</button>
                      <button id="btn-simpan" type="submit" class="btn btn-primary" disabled="disabled">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="changepasswordmodal" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="changePasswordLabel">Ganti Password</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{ route('setting.change.password') }}" id="formchangepw">
              @csrf 
                <label>Password Baru</label>
                <div class="input-group mb-3">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password baru" aria-describedby="basic-addon2" autocomplete="new-password" name="password" required>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <label>Konfirmasi Password</label>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="konfirmasi password" aria-describedby="basic-addon2" name="password_confirmation" required autocomplete="new-password" required>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="button" id="changepassword" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </div> 

  
  </section>
@endsection

@section('footer-script')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
  $("#btn-edit").click(function(){
    $("#name").removeAttr('disabled')
    $("#username").removeAttr('disabled')
    $("#btn-simpan").removeAttr('disabled')
    $("#btn-edit").attr('disabled','disabled')
  })
  $("#btn-simpan").click(function(){
    $("#btn-simpan").removeAttr('disabled')
  })
  $("#changepassword").click(function(){
    $("#formchangepw").submit()
  })

  @error('password')
    $("#btn-modal").click()
  @enderror
  @include('layouts.admin.alert')
</script>
@endsection

