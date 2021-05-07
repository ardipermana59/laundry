<div class="">
  <div class="clearfix mb-2">
    <div class="float-right">
      @include('livewire.outlet.modal-create')
      @include('livewire.outlet.modal-update')
      <a href="{{ route('outlet.trash') }}" class="btn btn-info"><i class="fas fa-trash"></i>&nbsp&nbspSampah</a>
    </div>
  </div>
  <div class="card">

    <div class="card-header">

      <h3 class="card-title">Daftar Outlet</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0  overflow-auto">

      <table class="table table-striped table-bordered" >
          <thead>
              <tr>
                <th class="text-center align-middle">No</th>
                <th class="text-center align-middle">Nama</th>
                <th class="text-center align-middle">Alamat</th>
                <th class="text-center align-middle">Nomor Telpon</th>
                <th class="text-center align-middle" style="width: 16%">Aksi</th>
              </tr>
          </thead>

          <tbody>
            @php $no = 1 @endphp
            @forelse($outlets as $outlet)
              <tr>
                <td style="width: 1%">{{ $no}}</td>
                <td>{{ $outlet->name }}</td>
                <td>{{ $outlet->address }}</td>
                <td>{{ $outlet->tlp }}</td>
                <td class="text-center">
                  <button wire:click="edit({{ $outlet->id }})" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUpdate">Edit</button>
                  <button wire:click="confirmation({{ $outlet->id }})" type="button" class="btn btn-danger btn-outlet">Hapus</button>

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
      {{ $outlets->links()}}
  </div>

  </div>

</div>
