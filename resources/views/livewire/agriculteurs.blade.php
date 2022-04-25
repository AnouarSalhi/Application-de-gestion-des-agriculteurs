 <div>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         
         </h2>
     </x-slot>
     @if(Auth::user()->hasRole('admin'))
         @if($updateMode)
             @include('livewire.agriculteurs.update')
         @else
             @include('livewire.agriculteurs.create')
         @endif
     @else
         @if($updateMode)
             @include('livewire.agriculteurs.update')
         @endif
     @endif

     <br>
        <table class="table table-bordered mt-5" id="sampleTable">
            <thead class="thead-dark">
            <tr>
                <th>Agriculteur_id</th>
                <th>Agriculteur_nom</th>
                <th>Agriculteur_prenom</th>
                <th>Agriculteur_resid</th>
                @if(Auth::user()->hasRole('editor|admin'))
                <th>Action</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($agers as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->agr_nom }}</td>
                    <td>{{ $value->agr_prn }}</td>
                    <td>{{ $value->agr_resid }}</td>
                    @if(Auth::user()->hasRole('editor|admin'))
                        <td>
                            <button wire:click="edit({{ $value->id }})"
                                    class="btn btn-primary btn-sm">Edit</button>
                            @if(Auth::user()->hasRole('admin'))
                                <button wire:click="delete({{ $value->id }})"
                                        class="btn btn-danger btn-sm">Delete</button>
                            @endif
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>


     <script>
         $(document).ready(function() {
             $('#sampleTable').DataTable({
                 responsive: true,
             });
         });
     </script>
    </div>





