<?php

namespace App\Http\Livewire\Outlet;

use Livewire\Component;
use App\Models\Outlet;

class Trash extends Component
{
    protected $listeners = [
      'destroy' => 'forceDelete',
      'restore' => 'restoreOutlet',
      'destroyAll' => 'forceDeleteAll'
    ];

    public function render()
    {
        return view('livewire.outlet.trash',[
          'outlets' => Outlet::onlyTrashed()->paginate(10)
        ]);
    }

    public function forceDelete($id)
    {
      $outlet = Outlet::withTrashed()->where('id', $id);
      $outlet->forceDelete();
      return $this->dispatchBrowserEvent('success',['text' => 'Outlet berhasil dihapus']);
    }

    public function forceDeleteAll()
    {
      $outlets = Outlet::onlyTrashed()->get();
      // dd($outlets->first->id);
      if ($outlets->first->id == null) {
          return $this->dispatchBrowserEvent('info',['text' => 'Tidak ada data dalam sampah.']);
      }
      foreach ($outlets as $outlet) {
          $outlet->where('id', $outlet->id)->forceDelete();
      }
      return $this->dispatchBrowserEvent('success',['text' => 'Seluruh sampah berhasil dibersihkan.']);
    }

    public function restoreOutlet($id)
    {
      Outlet::withTrashed()->where('id', $id)->restore();
      return $this->dispatchBrowserEvent('success',['text' => 'Outlet berhasil dipulihkan']);
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
