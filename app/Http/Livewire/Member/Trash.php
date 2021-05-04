<?php

namespace App\Http\Livewire\Member;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Member;

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
        return view('livewire.member.trash',[
          'members' => Member::onlyTrashed()->paginate(10)
        ]);
    }

    public function forceDelete($id)
    {
      $member = Member::withTrashed()->where('id', $id);
      $member->forceDelete();
      return $this->dispatchBrowserEvent('success',['text' => 'Member berhasil dihapus']);
    }

    public function forceDeleteAll()
    {
      $members = Member::onlyTrashed()->get();
      // dd($members->first->id);
      if ($members->first->id == null) {
          return $this->dispatchBrowserEvent('info',['text' => 'Tidak ada data dalam sampah.']);
      }
      foreach ($members as $member) {
          $member->where('id', $member->id)->forceDelete();
      }
      return $this->dispatchBrowserEvent('success',['text' => 'Seluruh sampah berhasil dibersihkan.']);
    }

    public function restoreOutlet($id)
    {
      Member::withTrashed()->where('id', $id)->restore();
      return $this->dispatchBrowserEvent('success',['text' => 'Member berhasil dipulihkan']);
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
