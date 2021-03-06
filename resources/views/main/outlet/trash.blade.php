@extends('layouts.admin.master')
@section('title','Daftar Outlet')
@section('page-title','Outlet')
@section('breadcrumb','outlet')

@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection

@php
  $no = $outlets->firstItem()
@endphp

@section('content')
  <section class="content">
    <div class="mb-3">
      <a href="{{ route('outlet.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>&nbspback</a>
    </div>
    <div class="card overflow-auto">
      <div class="card-header">
        <h3 class="card-title">Daftar sampah</h3>

        <div class="card-tools">
          <form action="{{ route('outlet.forceDelete.all') }}" method="post">
            @csrf
            @method('delete')
            <button type="button" class="btn btn-danger force-delete-all">Hapus Semua</button>
          </form>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped table-bordered" >
            <thead>
              <tr>
                <th class="text-center align-middle">No</th>
                <th class="text-center align-middle">Nama</th>
                <th class="text-center align-middle">Alamat</th>
                <th class="text-center align-middle">Nomor Telpon</th>
                <th class="text-center align-middle">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($outlets as $outlet)
                <tr>
                  <td style="width: 1%">{{ $no}}</td>
                  <td>{{ $outlet->name }}</td>
                  <td>{{ $outlet->address }}</td>
                  <td>{{ $outlet->tlp }}</td>
                  <td>
                    <a href="{{ route('outlet.restore', ['outlet' => $outlet->id ]) }}" class="btn btn-primary">Restore</a>
                    <form id="destroy-outlet" method="post" class="d-inline" action="{{ route('outlet.forceDelete',['outlet' => $outlet->id  ]) }}">
                      @csrf
                      @method('delete')
                      <button type="button" class="btn btn-danger btn-outlet">Hapus</button>
                    </form>
                  </td>
                </tr>
                @php
                  $no++;
                @endphp
              @empty
                <tr>
                  <td colspan="5" class="text-center">tidak ada data</td>
                </tr>
              @endforelse
                
            </tbody>
          </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
@endsection

@section('footer-script')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
    $(".btn-outlet").click(function(){
      Swal.fire({
        title: 'Anda yakin ingin menghapus secara permanen ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          
          Swal.fire({
            title :'Terhapus',
            text: 'Data berhasil dihapus',
            icon :'success'
          })
          $(this).parent().submit()
        }
      })
    })
    $(".force-delete-all").click(function(){
      Swal.fire({
        title: 'Anda yakin ingin menghapus seluruh sampah outlet',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          $(this).parent().submit()
        }
      })
    })
    @include('layouts.admin.alert')

</script>
@endsection