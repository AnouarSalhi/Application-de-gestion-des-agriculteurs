<div>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Parcelles') }}
            </h2>
        </x-slot>

        @if(Auth::user()->hasRole('admin'))
            @if($isOpen)
                @include('livewire.parcelle.update')
            @else
                @include('livewire.parcelle.create')
            @endif
        @else
            @if($isOpen)
                @include('livewire.parcelle.update')
            @endif
        @endif
        <table class="table table-bordered mt-5" id="sampleTable">
            <thead>
            <tr>
                <th>Par id</th>
                <th>Parcelle lieu</th>
                <th>Parcelle nom</th>
                <th>Parcelle superficie</th>
                <th>Parcelle prop</th>
                @if(Auth::user()->hasRole('editor|admin'))
                    <th>Action</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($parcelle as $value)
                <tr>
                    <td>{{ $value->par_id }}</td>
                    <td>{{ $value->par_lieu }}</td>
                    <td>{{ $value->par_nom }}</td>
                    <td>{{ $value->par_superficie }}</td>
                    <td>{{ $value->par_prop }}</td>
                    @if(Auth::user()->hasRole('editor|admin'))
                        <td>
                            <button wire:click="edit({{ $value->par_id }})"
                                    class="btn btn-primary btn-sm">Edit</button>
                            @if(Auth::user()->hasRole('admin'))
                                <button wire:click="delete({{ $value->par_id }})"
                                        class="btn btn-danger btn-sm">Delete</button>
                            @endif
                        </td>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>

        </script>
        <script>
            $(document).ready(function() {
                $('#sampleTable').DataTable({
                    responsive: true,
                });
            });
        </script>
    </div>

</div>
