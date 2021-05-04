<?php

namespace App\Http\Livewire\Paket;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Packet;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];
    public function render()
    {

        return view('livewire.paket.index', [
          'packets' => Packet::paginate(10)
        ]);
    }

    public function destroy($id)
    {
      Packet::destroy($id);
      return $this->dispatchBrowserEvent('success',['text' => 'Paket berhasil dihapus']);
    }

    public function confirmation($id)
    {
      return $this->dispatchBrowserEvent('confirmation',[
        'id' => $id,
        'btnConfirm' => 'Ya, hapus data !',
        'text' => 'Apa anda yakin ingin hapus data paket?',
      ]);
    }
}
