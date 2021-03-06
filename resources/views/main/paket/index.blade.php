@extends('layouts.admin.master')
@section('title','Daftar Paket')
@section('page-title','Paket')
@section('breadcrumb','paket')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

@php
  $no = $pakets->firstItem()
@endphp
<section class="content">
      <div class="clearfix mb-2">
        <div class="float-right">
          <a href="{{ route('paket.trash') }}" class="btn btn-info"><i class="fas fa-trash"></i>&nbsp&nbspSampah</a>
        </div>
      </div>
      <div class="card overflow-auto">
        <div class="card-header">
          <h3 class="card-title">Daftar Paket</h3>
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
                    <th class="text-center align-middle">Outlet</th>
                    <th class="text-center align-middle">Jenis</th>
                    <th class="text-center align-middle">Nama Paket</th>
                    <th class="text-center align-middle">Biaya</th>
                    <th class="text-center align-middle">Aksi</th>
                  </tr>
              </thead>
              <tbody>
              	@forelse($pakets as $paket)
                  <tr>
                  	<td>{{ $no }}</td>
                  	<td>{{ $paket->outlet->name }}</td>
                    <td>{{ $paket->type }}</td>
                  	<td>{{ $paket->packet_name }}</td>
                  	<td>{{ formatRp($paket->cost) }}</td>
                    <td>
                      <a href="{{ route('paket.edit', ['paket' => $paket->id ]) }}" class="btn btn-warning">Edit</a>
                      
                      <form id="destroy-outlet" method="post" class="d-inline" action="{{ route('paket.destroy',['paket' => $paket->id  ]) }}">
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
                  	<td colspan="6" class="text-center">tidak ada data</td>
                  </tr>
                @endforelse
                
              </tbody>
          </table>

        </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      {{ $pakets->links() }}

    </section>

@endsection

@section('footer-script')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
    $(".btn-outlet").click(function(){
      Swal.fire({
        title: 'Anda yakin ingin menghapus data paket',
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