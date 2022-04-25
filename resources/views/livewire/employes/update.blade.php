<form class="col-md-6 mx-auto my-2 py-4 px-4" style="box-shadow: 4px 3px 8px 1px #969696;border-radius:20px;">
    <div class="form-group">
        <input type="hidden" wire:model="emp_nss">
        <label for="exampleFormControlInput1">Employe nom</label>
        <input type="emp_nom" class="form-control" wire:model="emp_nom" id="exampleFormControlInput1">
        @error('emp_nom')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Employe prenom</label>
        <input type="text" class="form-control" wire:model="emp_prn" id="exampleFormControlInput2">
        @error('emp_prn')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="tarif" class="block mt-3 mb-1 font-medium text-sm text-gray-700">Employe Tarif</label>
        <select name="tarif" id="tarif" style="width: 100%;" wire:model="emp_tarif"
                class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
            <option value=""> </option>
            @foreach ($tarif as $value)
                <option value={{ $value->tar_description }}>{{ $value->tar_description }}</option>
            @endforeach

        </select>
        @error('emp_tarif')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- <div class="form-group">
        <label for="exampleFormControlInput3">Employe Tarif</label>
        <input type="text" class="form-control" wire:model="emp_tarif" id="exampleFormControlInput3">
        @error('emp_tarif')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> --}}
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
