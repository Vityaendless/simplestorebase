<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <br><h3>{{ $title }}</h3>
    <a href="/users/{{ $id }}">Return</a><br>
    <a href="/users/{{ $id }}/addresses/add">Add address</a>
    @if (!empty($addresses))
       <table class="tab">
                <tr>
                    <td>Type</td>
                    <td>№</td>
                    <td>Country</td>
                    <td>City</td>
                    <td>Street</td>
                    <td>Building</td>
                    <td>Appartment</td>
                </tr>
                    @foreach ($addresses as $address)
                         <tr @if($address->isMain === 1) style='background-color:yellow' @endif >
                             <td>@if($address->isMain === 1) Main @else Not Main<a href="/users/{{ $id }}/addresses/{{ $address->id }}/setasmain">(Set as main)</a> @endif</td>
                             <td>{{ $address->id }}@if($address->isEmpty != 1)<a href="/users/{{ $id }}/addresses/{{ $address->id }}/edit">(Edit)</a><a href="/users/{{ $id }}/addresses/{{ $address->id }}/delete">(Delete)</a>@endif</td>
                             @if($address->isEmpty === 1) <td colspan="5">No data.</td> @else
                             <td>{{ $address->country->name }}</td>
                             <td>{{ $address->city->name }}</td>
                             <td>{{ $address->street->name }}</td>
                             <td>{{ $address->building->name }}</td>
                             <td>{{ $address->appartment->name }}</td>
                             @endif
                         </tr>
                    @endforeach
       </table>
    @endif


</x-layout>