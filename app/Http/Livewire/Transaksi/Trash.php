<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Transaksi;

class Trash extends Component
{

    use WithPagination;

    protected $listeners = [
      'destroy' => 'forceDelete',
      'restore' => 'restoreOutlet',
      'destroyAll' => 'forceDeleteAll'
    ];

    public function render()
    {
        return view('livewire.transaksi.trash',[
          'transaksis' => Transaksi::onlyTrashed()->paginate(10)
        ]);
    }

    public function forceDelete($id)
    {
      $transaksi = Transaksi::withTrashed()->where('id', $id);
      $transaksi->forceDelete();
      return $this->dispatchBrowserEvent('success',['text' => 'Transaksi berhasil dihapus']);
    }

    public function forceDeleteAll()
    {
      $transaksis = Transaksi::onlyTrashed()->get();
      if ($transaksis->first->id == null) {
          return $this->dispatchBrowserEvent('info',['text' => 'Tidak ada data dalam sampah.']);
      }
      foreach ($transaksis as $transaksi) {
          $transaksi->where('id', $transaksi->id)->forceDelete();
      }
      return $this->dispatchBrowserEvent('success',['text' => 'Seluruh sampah berhasil dibersihkan.']);
    }

    public function restoreOutlet($id)
    {
      Transaksi::withTrashed()->where('id', $id)->restore();
      return $this->dispatchBrowserEvent('success',['text' => 'Transaksi berhasil dipulihkan']);
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