<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Transaksi;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];
    public function render()
    {

        return view('livewire.transaksi.index', [
          'transaksis' => Transaksi::paginate(10)
        ]);
    }

    public function destroy($id)
    {
      Transaksi::destroy($id);
      return $this->dispatchBrowserEvent('success',['text' => 'Transaksi berhasil dihapus']);
    }

    public function confirmation($id)
    {
      return $this->dispatchBrowserEvent('confirmation',[
        'id' => $id,
        'btnConfirm' => 'Ya, hapus data !',
        'text' => 'Apa anda yakin ingin hapus data transaksi?',
      ]);
    }
}
