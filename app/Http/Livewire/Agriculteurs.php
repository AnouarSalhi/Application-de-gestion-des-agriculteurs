<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Agriculteur;

class Agriculteurs extends Component
{
    public $agers, $agr_nom, $agr_prn, $agr_id, $agr_resid;
    public $updateMode = false;

    public function render()
    {
        $this->agers =Agriculteur::all();
        return view('livewire.agriculteurs');
    }
    private function resetInputFields(){
        $this->agr_nom = '';
        $this->agr_prn = '';
        $this->agr_resid = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'agr_nom' => 'required',
            'agr_prn' => 'required',
            'agr_resid' => 'required',
        ]);

        Agriculteur::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $agr = Agriculteur::where('id',$id)->first();
        $this->agr_id = $id;
        $this->agr_nom = $agr->agr_nom;
        $this->agr_prn = $agr->agr_prn;
        $this->agr_resid = $agr->agr_resid;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'agr_nom' => 'required',
            'agr_prn' => 'required',
            'agr_resid' => 'required',
        ]);

        if ($this->agr_id) {
            $agr = Agriculteur::find($this->agr_id);
            $agr->update([
                'agr_nom' => $this->agr_nom,
                'agr_prn' => $this->agr_prn,
                'agr_resid' => $this->agr_resid,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Agriculteur::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}
