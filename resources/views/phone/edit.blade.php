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
                <label for="phone_number">Phone:<i>+7XXXXXXXXXX</i> </label><br><input id="phone_number" name="phone_number" value="{{ $currentPhone->phone_number }}">
            </div>
            <div>
                <br><input type="submit" value="Edit phone">
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