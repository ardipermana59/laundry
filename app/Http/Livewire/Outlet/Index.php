<?php

namespace App\Http\Livewire\Outlet;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Outlet;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];
    public function render()
    {

        return view('livewire.outlet.index', [
          'outlets' => Outlet::paginate(10)
        ]);
    }

    public function destroy($id)
    {
      Outlet::destroy($id);
      $this->dispatchBrowserEvent('success',['text' => 'Outlet berhasil dihapus']);
    }

    public function confirmation($id)
    {
      $this->dispatchBrowserEvent('confirmation',[
        'id' => $id,
        'text' => 'Apa anda yakin ingin hapus data outlet?',
      ]);
    }
}
