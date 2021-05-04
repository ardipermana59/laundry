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
          @php $no = 1 @endphp
          @forelse($packets as $packet)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $packet->outlet->name }}</td>
              <td>{{ $packet->type }}</td>
              <td>{{ $packet->packet_name }}</td>
              <td>{{ formatRp($packet->cost) }}</td>
              <td style="width: 17%">
                <a href="{{ route('paket.edit', ['paket' => $packet->id ]) }}" class="btn btn-warning">Edit</a>
                <button wire:click="confirmation({{ $packet->id }})" type="button" class="btn btn-danger btn-outlet">Hapus</button>
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
    {{ $packets->links() }}
  </div>

  <!-- /.card-body -->
</div>
<!-- /.card -->
