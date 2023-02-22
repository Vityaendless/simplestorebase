<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <div class="form container">
        <p>{{ $title }}:</p>
        <a href="/users/{{ $id }}">Return</a><br>
        @php
            $nameParts = explode(" ", $currentName->name);
            if (isset($nameParts[1]))
            {echo $nameParts[1];} else {$nameParts[1] = ''; echo $nameParts[1];}
        @endphp
        <form action="" method="POST">
            @csrf
            <div>
                <label for="firstname">First name: </label><br><input id="firstname" name="firstname" value="{{ $nameParts[0] }}">
            </div>
            <div>
                <label for="secondname">Second name: </label><br><input id="secondname" name="secondname" value="{{ $nameParts[1] }}">
            </div>
            <div>
                <br><input type="submit" value="Edit name">
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