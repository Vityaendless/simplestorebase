<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <div class="form container">
        <p>Add new user:</p>
        <form action="" method="POST">
            @csrf
            <div>
                <label for="firstname">First name: </label><br><input id="firstname" name="firstname">
            </div>
            <div>
                <label for="secondname">Second name: </label><br><input id="secondname" name="secondname">
            </div>
            <div>
                <label for="email">Email: </label><br><input id="email" name="email">
            </div>
            <div>
                <label for="phone_number">Phone:<i>+7XXXXXXXXXX</i> </label><br><input id="phone_number" name="phone_number">
            </div>
            <div>
                <br><input type="submit" value="Add user">
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
        @if ($check == 1)
        <p>User added.</p>
        @endif
    </div>
</x-layout>