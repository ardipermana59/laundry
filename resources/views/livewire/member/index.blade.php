<div class="">
  <div class="clearfix mb-2">
    <div class="float-right">
      @include('livewire.member.modal-create')
      @include('livewire.member.modal-update')
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
            @php $no = 1 @endphp
            @forelse($members as $member)
              <tr>
                <td>{{ $no }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->address }}</td>
                <td class="text-center">{{ $member->gender }}</td>
                <td>{{ $member->tlp }}</td>
                <td>
                  <button wire:click="edit({{ $member->id }})" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">Edit</button>
                  <button wire:click="confirmation({{ $member->id }})" type="button" class="btn btn-danger">Hapus</button>

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
      {{ $members->links()}}
    </div>

    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</div>
