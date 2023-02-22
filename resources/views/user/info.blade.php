<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <br>
    <h3>{{ $title }}</h3>
    @if (!empty($user))
       <table class="tab">
                <tr>
                    <td>Characteristic</td>
                    <td>Value</td>
                </tr>
                <tr>
                    <td>Name<a href="/users/{{ $user->id }}/editname"><i>(change)</i></a>:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email<a href="/users/{{ $user->id }}/editmail"><i>(change)</i></a>:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Phone<a href="/users/{{ $user->id }}/editphone"><i>(change)</i></a>:</td>
                    <td>{{ $user->phone->phone_number }}</td>
                </tr>
                <tr>
                    <td>Main address:</td>
                    <td>@if($user->addresses
                                ->where('isMain', 1)->first()
                                ->country->id === 0)No address.
                                @else{{$user->addresses
                                ->where('isMain', 1)->first()
                                ->country->name
                                }}, {{ 
                                $user->addresses
                                ->where('isMain', 1)->first()
                                ->city->name
                                 }}, {{ 
                                $user->addresses
                                ->where('isMain', 1)->first()
                                ->street->name
                                 }}, {{ 
                                $user->addresses
                                ->where('isMain', 1)->first()
                                ->building->name
                                }}, {{ $user->addresses
                                ->where('isMain', 1)->first()
                                ->appartment->name }}
                                @endif</td>
                </tr>
                <tr>
                    <td>User addresses:</td>
                    <td><a href="/users/{{ $user->id }}/addresses">@if($user->addresses
                                ->where('isMain', 1)->first()->isEmpty === 1)Without adresses @else{{ $user->addresses->count() }} @if($user->addresses->count()===1) address @else addresses @endif @endif </a></td>
                </tr>
                <tr>
                    <td>User orders:</td>
                    <td><a href="/users/{{ $user->id }}/orders">@if($user->orders->groupBy('order_number')->count()>0){{ $user->orders->groupBy('order_number')->count() }}@else No orders @endif</a></td>
                </tr>
       </table>
    @endif


</x-layout>