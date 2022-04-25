<form class="col-md-6 mx-auto my-2 py-4 px-4" style="box-shadow: 4px 3px 8px 1px #969696;border-radius:20px;">
    <div class="form-group">
        <label for="exampleFormControlInput1">Employe nss</label>
        <input type="text" class="form-control" class="block mt-1 w-full" id="exampleFormControlInput1"
               placeholder="Enter name" wire:model="emp_nss">
        @error('emp_nss')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Employe nom</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter name"
               wire:model="emp_nom">
        @error('emp_nom')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Employe prenom </label>
        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="emp_prn" placeholder="Enter prenom">
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

        <input type="text" class="form-control" id="exampleFormControlInput3" wire:model="emp_tarif">
        @error('emp_tarif')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> --}}
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
