<?php

namespace App\Http\Livewire\Paket;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Packet;

class Trash extends Component
{
  use WithPagination;

  protected $listeners = [
    'destroy' => 'forceDelete',
    'restore' => 'restorePacket',
    'destroyAll' => 'forceDeleteAll'
  ];

  public function render()
  {
      return view('livewire.paket.trash',[
        'packets' => Packet::onlyTrashed()->paginate(10)
      ]);
  }

  public function forceDelete($id)
  {
    $packet = Packet::withTrashed()->where('id', $id);
    $packet->forceDelete();
    return $this->dispatchBrowserEvent('success',['text' => 'Paket berhasil dihapus']);
  }

  public function forceDeleteAll()
  {
    $packets = Packet::onlyTrashed()->get();
    if ($packets->first->id == null) {
        return $this->dispatchBrowserEvent('info',['text' => 'Tidak ada data dalam sampah.']);
    }
    foreach ($packets as $packet) {
        $packet->where('id', $packet->id)->forceDelete();
    }
    return $this->dispatchBrowserEvent('success',['text' => 'Seluruh sampah berhasil dibersihkan.']);
  }

  public function restorePacket($id)
  {
    Packet::withTrashed()->where('id', $id)->restore();
    return $this->dispatchBrowserEvent('success',['text' => 'Paket berhasil dipulihkan']);
  }

  public function confirmationForceDelete($id)
  {
    return $this->dispatchBrowserEvent('confirmation',[
      'id' => $id,
      'btnConfirm' => 'Ya, hapus data !',
      'text' => 'Data akan dihapus secara permanent dan tidak dapat dikembalikan.',
    ]);
  }

  public function confirmationRestore($id)
  {
    return $this->dispatchBrowserEvent('confirmation',[
      'id' => $id,
      'restore' => true,
      'btnConfirm' => 'Pulihkan !',
      'text' => 'Anda ingin mengembalikan data ini ?',
    ]);
  }

  public function confirmationForceAll()
  {
    $this->dispatchBrowserEvent('confirmation',[
      'destroyAll' => true,
      'btnConfirm' => 'Hapus Semua !',
      'text' => 'Data akan dihapus secara permanent dan tidak dapat dikembalikan.',
    ]);
  }

}
