<?php

namespace App\Http\Livewire\Member;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Member;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public function render()
    {
        return view('livewire.member.index',[
          'members' => Member::paginate(10)
        ]);
    }

    public function destroy($id)
    {
      Member::destroy($id);
      return $this->dispatchBrowserEvent('success',['text' => 'Member berhasil dihapus']);
    }

    public function confirmation($id)
    {
      return $this->dispatchBrowserEvent('confirmation',[
        'id' => $id,
        'btnConfirm' => 'Ya, hapus data !',
        'text' => 'Apa anda yakin ingin hapus data member?',
      ]);
    }
}
