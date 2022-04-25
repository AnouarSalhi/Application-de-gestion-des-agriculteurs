<form class="col-md-6 mx-auto my-2 py-4 px-4" style="box-shadow: 4px 3px 8px 1px #969696;border-radius:20px;">
    <div class="form-group ">
        <label for="exampleFormControlInput1">Agriculteur nom</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="agr_nom">
        @error('agr_nom') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Agriculteur prenom </label>
        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="agr_prn" placeholder="Enter prenom">
        @error('agr_prn') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Agriculteur Resid</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="agr_resid" placeholder="Enter Resid">
        @error('agr_resid') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
