<?php

namespace App\Http\Livewire\Member;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Member;

class Index extends Component
{
    public $name,$address,$tlp,$gender,$memberId;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    protected $rules = [
      'name' => ['required', 'max:100'],
      'address' => ['required','string'],
      'gender' => ['required','size:1'],
      'tlp' => ['required','numeric','digits_between:11,15'],
    ];

    public function render()
    {
        return view('livewire.member.index',[
          'members' => Member::paginate(10)
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate();

        Member::create($validatedData);
        $this->resetInput();
        $this->emit('stored'); // Close Modal with jquery, look at views/layouts/admin/master.blade.php
        return $this->dispatchBrowserEvent('success',['text' => 'Berhasil menambahkan Member baru']);
    }

    public function edit($id)
    {
      $member = Member::find($id);
      $this->name = $member->name;
      $this->tlp = $member->tlp;
      $this->memberId = $member->id;
      $this->address = $member->address;
      $this->gender = $member->gender;
    }

    public function update()
    {
      $validatedData = $this->validate();
      Member::where('id',$this->memberId)->update($validatedData);
      $this->emit('updated'); // Close Modal with jquery, look at views/layouts/admin/master.blade.php
      return $this->dispatchBrowserEvent('success',['text' => 'Data Member berhasil diubah']);
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

    private function resetInput()
    {
      $this->name = null;
      $this->address = null;
      $this->tlp = null;
      $this->gender = null;
      $this->memberId = null;
    }
}
