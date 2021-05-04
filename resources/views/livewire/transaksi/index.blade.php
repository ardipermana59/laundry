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
                <a href="{{ route('transaksi.edit', ['transaksi' => $transaksi->id ]) }}" class="btn btn-warning">Edit</a>

                <button wire:click="confirmation({{ $transaksi->id }})" type="button" class="btn btn-danger btn-outlet">Hapus</button>
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
