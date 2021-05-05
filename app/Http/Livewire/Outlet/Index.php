<?php

namespace App\Http\Livewire\Outlet;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Outlet;

class Index extends Component
{
    public $name, $address, $tlp, $outletId;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];
    protected $rules = [
      'name' => ['required', 'max:100'],
      'address' => ['required','string'],
      'tlp' => ['required','integer','max:15'],
    ];

    public function render()
    {
        return view('livewire.outlet.index', [
          'outlets' => Outlet::paginate(10)
        ]);
    }

    public function destroy($id)
    {
      Outlet::destroy($id);
      return $this->dispatchBrowserEvent('success',['text' => 'Outlet berhasil dihapus']);
    }

    public function confirmation($id)
    {
      return $this->dispatchBrowserEvent('confirmation',[
        'id' => $id,
        'btnConfirm' => 'Ya, hapus data !',
        'text' => 'Apa anda yakin ingin hapus data outlet?',
      ]);
    }
    public function store()
    {
        $validatedData = $this->validate();

        Outlet::create($validatedData);
        $this->resetInput();
        $this->emit('stored'); // Close Modal with jquery, look at views/layouts/admin/master.blade.php
        return $this->dispatchBrowserEvent('success',['text' => 'Berhasil menambahkan Outlet baru']);
    }

    public function edit($id)
    {
      $outlet = Outlet::find($id);
      $this->name = $outlet->name;
      $this->tlp = $outlet->tlp;
      $this->outletId = $outlet->id;
      $this->address = $outlet->address;
    }

    public function update()
    {
      $validatedData = $this->validate();
      Outlet::where('id',$this->outletId)->update($validatedData);
      $this->emit('updated'); // Close Modal with jquery, look at views/layouts/admin/master.blade.php
      return $this->dispatchBrowserEvent('success',['text' => 'Data Outlet berhasil diubah']);
    }
    private function resetInput()
    {
      $this->name = null;
      $this->address = null;
      $this->tlp = null;
    }
}
