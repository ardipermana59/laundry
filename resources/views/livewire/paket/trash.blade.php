<div class="card overflow-auto">
  <div class="card-header">
    <h3 class="card-title">Daftar sampah paket</h3>
    <div class="card-tools">
      <form action="{{ route('paket.forceDelete.all') }}" method="post">
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
          @forelse($packets as $paket)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $paket->outlet->name }}</td>
              <td>{{ $paket->type }}</td>
              <td>{{ $paket->packet_name }}</td>
              <td>{{ formatRp($paket->cost) }}</td>
              <td style="width: 17%">

                <button wire:click="confirmationRestore({{ $paket->id }})" type="button" class="btn btn-primary">Restore</button>
                <button wire:click="confirmationForceDelete({{ $paket->id }})" type="button" class="btn btn-danger">Hapus</button>
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
