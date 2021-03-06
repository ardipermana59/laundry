@extends('layouts.admin.master')
@section('title','Daftar Member')
@section('page-title','Member')
@section('breadcrumb','member')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

@php
  $no = $members->firstItem()
@endphp
<section class="content">
      <div class="mb-3">
        <a href="{{ route('member.index') }}" class="btn btn-info"><i class="fas fa-arrow-left"></i>&nbspback</a>
      </div>
      
      <div class="card overflow-auto">
        <div class="card-header">
          <h3 class="card-title">Data sampah</h3>
          <div class="card-tools">
            <form action="{{ route('member.forceDelete.all') }}" method="post">
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
                    <th class="text-center align-middle" style="width: 1%">No</th>
                    <th class="text-center align-middle">Nama</th>
                    <th class="text-center align-middle">Alamat</th>
                    <th class="text-center align-middle" style="width: 1%">Jenis Kelamin</th>
                    <th class="text-center align-middle">Nomor Telpon</th>
                    <th class="text-center align-middle">Aksi</th>
                  </tr>
              </thead>
              <tbody>
              	@forelse($members as $member)
                  <tr>
                  	<td>{{ $no }}</td>
                  	<td>{{ $member->name }}</td>
                    <td>{{ $member->address }}</td>
                  	<td class="text-center">{{ $member->gender }}</td>
                  	<td>{{ $member->tlp }}</td>
                    <td>
                      
                      <form id="destroy-member" method="post" class="d-inline" action="{{ route('member.forceDelete',['member' => $member->id  ]) }}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-member">Hapus</button>
                      </form>
                      <a href="{{ route('member.restore', ['member' => $member->id ]) }}" class="btn btn-primary">Restore</a>
                    </td>
                  </tr>
                  @php
                    $no++;
                  @endphp
                @empty
                  <tr>
                  	<td colspan="6" class="text-center">tidak ada data</td>
                  </tr>
                @endforelse
                
              </tbody>
          </table>

        </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      {{ $members->links() }}

    </section>

@endsection

@section('footer-script')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
    $(".btn-member").click(function(){
      Swal.fire({
        title: 'Anda yakin ingin menghapus data member secara permanent',
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
        title: 'Anda yakin ingin menghapus seluruh sampah member',
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