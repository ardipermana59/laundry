@extends('layouts.admin.master')
@section('title','Daftar Transaksi')
@section('page-title','Transaksi')
@section('breadcrumb','transaksi')
@section('header-script')
  <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('content')

@php
  $no = $transaksis->firstItem()
@endphp
<section class="content">
      <div class="clearfix mb-2">
        <div class="float-right">
          <a href="{{ route('transaksi.trash') }}" class="btn btn-info"><i class="fas fa-trash"></i>&nbsp&nbspSampah</a>
        </div>
      </div>
      <div class="card overflow-auto">
        <div class="card-header">
          <h3 class="card-title">Daftar Transaksi</h3>
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
                    <th class="align-middle text-center" style="width: 1%">No</th>
                    <th class="align-middle text-center">Nama Outlet</th>
                    <th class="align-middle text-center">Kode Invoice</th>
                    <th class="align-middle text-center">Pembeli</th>
                    <th class="align-middle text-center">Kasir</th>
                    <th class="align-middle text-center">Batas Waktu</th>
                    <th class="align-middle text-center">Biaya Tambahan</th>
                    <th class="align-middle text-center">Diskon</th>
                    <th class="align-middle text-center">Pajak</th>
                    <th class="align-middle text-center">Dibayar</th>
                    <th class="align-middle text-center">Status</th>
                    <th class="align-middle text-center">Aksi</th>
                  </tr>
              </thead>
              <tbody>
              	@forelse($transaksis as $transaksi)
                  <tr>
                  	<td>{{ $no }}</td>
                    <td>{{ $transaksi->outlet->name }}</td>
                    <td>{{ $transaksi->invoice_code }}</td>
                    <td>{{ $transaksi->member->name }}</td>
                    <td>{{ $transaksi->user->name }}</td>
                    <td>{{ $transaksi->deadline }}</td>
                    <td>{{ $transaksi->cost_additional }}</td>
                    <td>{{ $transaksi->discon }}</td>
                    <td>{{ $transaksi->tax }}</td>
                    <td>{{ $transaksi->paid }}</td>
                  	<td>{{ $transaksi->status }}</td>
                    <td>
                      <a href="{{ route('transaksi.edit', ['transaksi' => $transaksi->id ]) }}" class="btn btn-warning">Edit</a>
                      
                      <form method="post" class="d-inline" action="{{ route('transaksi.destroy',['transaksi' => $transaksi->id  ]) }}">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger btn-transaksi">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @php
                    $no++;
                  @endphp
                @empty
                  <tr>
                  	<td colspan="12" class="text-center">tidak ada data</td>
                  </tr>
                @endforelse
                
              </tbody>
          </table>

        </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      {{ $transaksis->links() }}

    </section>

@endsection

@section('footer-script')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
    $(".btn-transaksi").click(function(){
      Swal.fire({
        title: 'Anda yakin ingin menghapus data transaksi',
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