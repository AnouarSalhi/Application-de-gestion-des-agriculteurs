<form class="col-md-6 mx-auto my-2 py-4 px-4" style="box-shadow: 4px 3px 8px 1px #969696;border-radius:20px;">
    <div class="form-group">
        <input type="hidden" wire:model="tar_description">
        <label for="exampleFormControlInput1">Tarif ero</label>
        <input type="tar_ero" class="form-control" wire:model="tar_ero" id="exampleFormControlInput1">
        @error('tar_ero')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
