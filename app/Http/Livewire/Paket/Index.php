<?php

namespace App\Http\Livewire\Paket;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Packet;
use App\Models\Outlet;

class Index extends Component
{
    public $outlet_id, $type, $packet_name, $cost, $outlets;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];
    protected $rules = [
      'outlet_id' => ['required','integer'],
      'type' => ['required','string'],
      'packet_name' => ['required','string'],
      'cost' => ['required']
    ];

    public function mount ()
    {
      $this->outlets = Outlet::all();
    }

    public function render()
    {
        return view('livewire.paket.index', [
          'packets' => Packet::paginate(10)
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate();

        Packet::create($validatedData);
        $this->resetInput();
        $this->emit('stored'); // Close Modal with jquery, look at views/layouts/admin/master.blade.php
        return $this->dispatchBrowserEvent('success',['text' => 'Berhasil menambahkan Paket baru']);
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

    private function resetInput()
    {
      $this->outlet_id = null;
      $this->type = null;
      $this->packet_name = null;
      $this->cost = null;
    }
}
