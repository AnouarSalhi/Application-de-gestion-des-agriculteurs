<?php

namespace App\Http\Livewire;

use App\Models\Parcelle;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Parcelles extends Component
{
    public $isOpen = 0;
    public $parcelle, $agr, $par_id, $par_lieu, $par_nom, $par_superficie, $par_prop;
    public function render()
    {
        $this->parcelle = Parcelle::all();
        $this->agr = DB::table('agriculteurs')->get();
        return view('livewire.parcelles');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function cancel()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->par_lieu = '';
        $this->par_nom = '';
        $this->par_superficie = '';
        $this->par_prop = '';
    }

    public function store()
    {
        $this->validate([
            'par_lieu' => 'required',
            'par_nom' => 'required',
            'par_superficie' => 'required',
            'par_prop' => 'required'
        ]);

        Parcelle::updateOrCreate(['par_lieu' => $this->par_lieu, 'par_nom' => $this->par_nom, 'par_superficie' => $this->par_superficie, 'par_prop' => $this->par_prop]);
        session()->flash(
            'message',
            $this->par_id ? 'Agr Updated Successfully.' : 'Agr Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $Agri = Parcelle::findOrFail($id);
        $this->par_id = $id;
        $this->par_lieu = $Agri->par_lieu;
        $this->par_superficie = $Agri->par_superficie;
        $this->par_nom = $Agri->par_nom;
        $this->par_prop = $Agri->par_prop;

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'par_lieu' => 'required',
            'par_nom' => 'required',
            'par_superficie' => 'required',
            'par_prop' => 'required'
        ]);

        Parcelle::find($this->par_id)->update([
            'par_lieu' => $this->par_lieu,
            'par_nom' => $this->par_nom,
            'par_superficie' => $this->par_superficie,
            'par_prop' => $this->par_prop
        ]);
        $this->closeModal();
        session()->flash('message', 'Parcelle Updated Successfully.');
        $this->resetInputFields();
    }
    public function delete($id)
    {
        if ($id) {
            Parcelle::find($id)->delete();
            session()->flash('message', 'Post Deleted Successfully.');
        }
    }
}
