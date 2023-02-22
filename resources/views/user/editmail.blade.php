<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <div class="form container">
        <p>{{ $title }}:</p>
        <a href="/users/{{ $id }}">Return</a><br>
        <form action="" method="POST">
            @csrf
            <div>
                <label for="email">Email: </label><br><input id="email" name="email" value="{{ $currentEmail->email }}">
            </div>
            <div>
                <br><input type="submit" value="Edit email">
            </div>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</x-layout>