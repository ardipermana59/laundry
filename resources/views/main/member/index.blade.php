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
      <div class="clearfix mb-2">
        <div class="float-right">
          <a href="{{ route('member.trash') }}" class="btn btn-info"><i class="fas fa-trash"></i>&nbsp&nbspSampah</a>
        </div>
      </div>
      <div class="card overflow-auto">
        <div class="card-header">
          <h3 class="card-title">Daftar Member</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
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
                      <a href="{{ route('member.edit', ['member' => $member->id ]) }}" class="btn btn-warning">Edit</a>
                      
                      <form id="destroy-member" method="post" class="d-inline" action="{{ route('member.destroy',['member' => $member->id  ]) }}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-member">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @php
                    $no++;
                  @endphp
                @empty
                  <tr>
                  	<td colspan="4" class="text-center">tidak ada data</td>
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
        title: 'Anda yakin ingin menghapus data member',
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
    @include('layouts.admin.alert')
    
</script>
@endsection