<div class="card overflow-auto">
  <div class="card-header">
    <h3 class="card-title">Daftar Sampah Transaksi</h3>
    <div class="card-tools">
      <form action="{{ route('transaksi.forceDelete.all') }}" method="post">
        @csrf
        @method('delete')
        <button wire:click="confirmationForceAll()" type="button" class="btn btn-danger force-delete-all">Hapus Semua</button>
      </form>
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
          @php $no = 1 @endphp
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
                <button wire:click="confirmationRestore({{ $transaksi->id }})" type="button" class="btn btn-primary">Restore</button>
                <button wire:click="confirmationForceDelete({{ $transaksi->id }})" type="button" class="btn btn-danger">Hapus</button>
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
    {{ $transaksis->links() }}
  </div>

  <!-- /.card-body -->
</div>
<!-- /.card -->
