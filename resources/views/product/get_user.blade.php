<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <br><h3>{{ $title }}</h3>
    <div class="form">
        <form action="/addorder/user" method="POST">
            @csrf
            <label for="user">Select user for order: </label>
            <select id="user" name="user">
                @foreach($users as $user)
                <option id="user" value="{{ $user->id }}" @if($user->id == 1) selected="selected" @endif>{{ $user->name }} - {{ $user->email }}</option>
                @endforeach
            </select>
            <input type="submit" value="Add order">
        </form>
    </div>
 </x-layout>