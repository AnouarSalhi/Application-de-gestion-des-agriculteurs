<?php

namespace App\Http\Livewire;

use App\Models\Tarif;
use Livewire\Component;

class Tarifs extends Component
{
    public $tarifs, $tar_ero, $tar_description;
    public $updateMode = false;

    public function render()
    {
        $this->tarifs =Tarif::all();
        return view('livewire.tarifs');
    }

    private function resetInputFields(){
        $this->tar_description = '';
        $this->tar_ero = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'tar_description' => 'required',
            'tar_ero' => 'required',
        ]);

        Tarif::create($validatedDate);

        session()->flash('message', 'Tarif Created Successfully.');

        $this->resetInputFields();

    }



    public function edit($id)
    {
        $this->updateMode = true;
        $tar = Tarif::where('tar_description',$id)->first();
        $this->tar_ero = $tar->tar_ero;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'tar_description' => 'required',
            'tar_ero' => 'required',
        ]);

        if ($this->tar_description) {
            $tar = Tarif::find($this->tar_description);
            $tar->update([
                'tar_description' => $this->tar_description,
                'tar_ero' => $this->tar_ero,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Tarif Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Tarif::find($id)->delete();
            session()->flash('message', 'Tarif Deleted Successfully.');
        }
    }
}
