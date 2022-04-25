<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tarifs') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('admin'))
        @if($updateMode)
            @include('livewire.tarifs.update')
        @else
            @include('livewire.tarifs.create')
        @endif
    @else
        @if($updateMode)
            @include('livewire.tarifs.update')
        @endif
    @endif


    <table class="table table-bordered mt-5" id="sampleTable">
        <thead>
        <tr>
            <th>Tarif description</th>
            <th>Tarif ero</th>
            @if(Auth::user()->hasRole('editor|admin'))
                <th>Action</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($tarifs as $value)
            <tr>
                <td>{{ $value->tar_description }}</td>
                <td>{{ $value->tar_ero }}</td>
                @if(Auth::user()->hasRole('editor|admin'))
                    <td>
                        <button wire:click="edit({{ json_encode($value->tar_description) }})"
                                class="btn btn-primary btn-sm">Edit</button>
                        @if(Auth::user()->hasRole('admin'))
                            <button wire:click="delete({{ json_encode($value->tar_description)}})"
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
