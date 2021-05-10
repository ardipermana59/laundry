<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
  Tambah Data
</button>

<!-- Modal Create Paket -->
<div wire:ignore.self class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Paket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
              <label for="name">Nama Outlet</label>
                <select wire:model="outlet_id" name="outlet_id" class="form-control @error('outlet_id') is-invalid @enderror">
                  <option value="">Pilih Outlet</option>
                  @forelse($outlets as $outlet)
                      <option value="{{ $outlet->id }}" @if( old('outlet_id') == $outlet->id ) {{ 'selected' }} @endif>{{ $outlet->name }}</option>
                  @empty
                      <option value="">Tidak ada outlet</option>
                  @endforelse
                    </select>
                  @error('outlet_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div>
            <div class="form-group">
              <label for="type">Jenis Paket</label>
              <select wire:model="type" class="form-control @error('type') is-invalid @enderror" name="type">
                <option value="">Pilih type Paket</option>
                <option value="kiloan" @if (old('type') == 'kiloan') {{ 'selected' }} @endif>Kiloan</option>
                <option value="selimut" @if (old('type') == 'selimut') {{ 'selected' }} @endif>Selimut</option>
                <option value="bed_cover" @if (old('type') == 'bed_cover') {{ 'selected' }} @endif>Bed Cover</option>
                <option value="kaos" @if (old('type') == 'kaos') {{ 'selected' }} @endif>Kaos</option>
                <option value="lain" @if (old('type') == 'lain') {{ 'selected' }} @endif>Lain - lain</option>
              </select>
              @error('type')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="packet_name">Nama Paket</label>
              <input wire:model="packet_name" type="text" name="packet_name" class="form-control @error('packet_name') is-invalid @enderror" placeholder="nama paket ..." value="{{ old('packet_name')}}">
              @error('packet_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="cost">Biaya</label>
              <input wire:model="cost" type="number" name="cost" class="form-control @error('cost') is-invalid @enderror" id="cost" placeholder="0">
              @error('cost')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button wire:click="store()" type="button" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>
