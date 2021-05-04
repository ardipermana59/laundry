<div class="card overflow-auto">
  <div class="card-header">
    <h3 class="card-title">Data sampah</h3>
    <div class="card-tools">
      <form action="{{ route('member.forceDelete.all') }}" method="post">
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
              <th class="text-center align-middle">Nama</th>
              <th class="text-center align-middle">Alamat</th>
              <th class="text-center align-middle" style="width: 1%">Jenis Kelamin</th>
              <th class="text-center align-middle">Nomor Telpon</th>
              <th class="text-center align-middle">Aksi</th>
            </tr>
        </thead>
        <tbody>
          @php $no = 1 @endphp
          @forelse($members as $member)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $member->name }}</td>
              <td>{{ $member->address }}</td>
              <td class="text-center">{{ $member->gender }}</td>
              <td>{{ $member->tlp }}</td>
              <td>

                <button wire:click="confirmationRestore({{ $member->id }})" type="button" class="btn btn-primary">Restore</button>
                <button wire:click="confirmationForceDelete({{ $member->id }})" type="button" class="btn btn-danger">Hapus</button>
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
