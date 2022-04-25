<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employes') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('admin'))
        @if($updateMode)
            @include('livewire.employes.update')
        @else
            @include('livewire.employes.create')
        @endif
    @else
        @if($updateMode)
            @include('livewire.employes.update')
        @endif
    @endif


    <table class="table table-bordered mt-5" id="sampleTable">
        <thead>
        <tr>
            <th>Emp_nss</th>
            <th>Emp_nom</th>
            <th>Emp_prn</th>
            <th>Emp_tarif</th>
            @if(Auth::user()->hasRole('editor|admin'))
                <th>Action</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($emps as $value)
            <tr>
                <td>{{ $value->emp_nss }}</td>
                <td>{{ $value->emp_nom }}</td>
                <td>{{ $value->emp_prn }}</td>
                <td>{{ $value->emp_tarif }}</td>
                @if(Auth::user()->hasRole('editor|admin'))
                    <td>
                        <button wire:click="edit({{ json_encode($value->emp_nss) }})"
                                class="btn btn-primary btn-sm">Edit</button>
                        @if(Auth::user()->hasRole('admin'))
                            <button wire:click="delete({{ json_encode($value->emp_nss) }})"
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

