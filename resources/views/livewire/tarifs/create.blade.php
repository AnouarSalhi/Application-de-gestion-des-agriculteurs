<form class="col-md-6 mx-auto my-2 py-4 px-4" style="box-shadow: 4px 3px 8px 1px #969696;border-radius:20px;">
    <div class="form-group">
        <label for="exampleFormControlInput1">Tarif description</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter description" wire:model="tar_description">
        @error('tar_description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Tarif ero</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="tar_ero" placeholder="Enter ero">
        @error('tar_ero') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
