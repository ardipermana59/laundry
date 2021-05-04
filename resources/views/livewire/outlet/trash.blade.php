<div class="card overflow-auto">
  @php
    $no = $outlets->firstItem()
  @endphp
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="card-header">
      <h3 class="card-title">Daftar sampah</h3>

      <div class="card-tools">
        <form action="{{ route('outlet.forceDelete.all') }}" method="post">
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
                <td style="width: 17%">
                  <button wire:click="confirmationRestore({{ $outlet->id }})" type="button" class="btn btn-primary">Restore</button>
                  <button wire:click="confirmationForceDelete({{ $outlet->id }})" type="button" class="btn btn-danger">Hapus</button>
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
