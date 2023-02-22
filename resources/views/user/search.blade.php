<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <div class="form">
        <form action="" method="POST">
            @csrf
            <label for="name">Name: </label><input id="name" name="name">
            <label for="email">Email: </label><input id="email" name="email">
            <label for="phone">Phone: </label><input id="phone" name="phone">
            <input type="submit" value="Find">
        </form>
    </div>
    @if (!empty($users))
       <table class="tab">
                <tr>
                    <td>№</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Main address</td>
                </tr>
                    @foreach ($users as $user)
                         <tr>
                             <td>{{ $user->id }}</td>
                             <td><a href="/users/{{ $user->id }}">{{ $user->name }}</a></td>
                             <td>{{ $user->email }}</td>
                             <td>{{ $user->phone->phone_number }}</td>
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
                                @endif                        
                            </td>
                         </tr>
                    @endforeach
       </table>
    @endif


</x-layout>