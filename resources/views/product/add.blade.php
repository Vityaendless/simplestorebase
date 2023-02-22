<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <br><h3>{{ $title }}</h3><br>
    <a href="/addorder">Return</a>
    <div class="form">
        <p>{{ $messageforprice }}</p>
        <form action="" method="POST">
            @csrf
            <input id="user" name="user" value="{{$user->id}}" style="display: none;">
            <label for="name">Name: </label><input id="name" name="name">
            <label for="minprice">Min price: </label><input type="number" id="minprice" name="minprice" value="0">
            <label for="maxprice">Max price: </label><input type="number" id="maxprice" name="maxprice" value="0">
            <label for="type">Type: </label>
            <select id="type" name="type">
                @foreach($producttypes as $producttype)
                <option id="type" value="{{ $producttype->id }}">{{ $producttype->type_name }}</option>
                @endforeach
            </select>
            <input type="submit" value="Find product">
        </form>
    </div>
    <div class="form">
        <form action="/addorder/create" method="POST">
        @csrf
        <input type="submit" value="Finish order">
        <input id="user" name="user" value="{{$user->id}}" style="display: none;">
    @if (!empty($products))
       <table class="tab">
                <tr>
                    <td>№</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Type</td>
                </tr>
                    @foreach ($products as $product)
                         <tr>
                             <td><input id="product_id_{{ $product->id }}" name="product_id_{{ $product->id }}" value="{{ $product->id }}" style="display: none;">{{ $product->id }}</td>
                             <td>{{ $product->name }}</td>
                             <td>{{ $product->description }}</td>
                             <td>{{ $product->price }}</td>
                             <td><input type="number" id="{{ $product->id }}" name="{{ $product->id }}" min="0" value="0"> of {{ $product->quantity }}</td>
                             <td>{{ $product->producttype->type_name }}</td>
                         </tr>
                    @endforeach
       </table>
    @endif
        </form>
    </div>


</x-layout>