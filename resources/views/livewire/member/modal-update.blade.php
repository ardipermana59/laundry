<div wire:ignore.self class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
              <label for="name">Nama Lengkap</label>
              <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="nama lengkap ..." value="{{ old('name') }}">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="gender">Jenis Kelamin</label>
              <select wire:model="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" @if (old('gender') == 'L') {{ 'selected' }} @endif>Laki - laki</option>
                <option value="P" @if (old('gender') == 'P') {{ 'selected' }} @endif>Perempuan</option>
              </select>
              @error('gender')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="tlp">Nomor Telpon</label>
              <input wire:model="tlp" type="text" class="form-control @error('tlp') is-invalid @enderror" id="tlp" name="tlp" placeholder="081222333444" value="{{ old('tlp') }}">
              @error('tlp')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="address">Alamat Lengkap</label>
              <textarea wire:model="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat lengkap ..." name="address" id="address">{{ old('address') }}</textarea>
              @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button wire:click="update()" type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
