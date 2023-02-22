<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <div>
        <p>{{ $title }}</p>
        <a href="/ordersinprogress/{{ $currentOrder->first()->order_number }}/orderinfo">Return</a><br>
        @if (!empty($currentOrder))
        <table class="tab">
                <tr>
                    <td>Characteristic</td>
                    <td>Value</td>
                </tr>
                <tr>
                    <td>Order number</td>
                    <td>{{ $currentOrder->first()->order_number }}</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>{{ $currentOrder->first()->status->name }}</td>
                </tr>
                <tr>
                    <td>User:</td>
                    <td><a href="/users/{{ $currentOrder->first()->user->id }}">{{ $currentOrder->first()->user->name }}</a></td>
                </tr>
                <tr>
                    <td>Total sum:</td>
                    <td>{{ $currentOrder->first()->total_sum }}</td>
                </tr>
        </table>
        @endif
        <p>{{ $messageifquantityisbig }}</p>
        <form action="" method="POST">
        @csrf
        <input type="submit" value="Change quantity">
        @if (!empty($currentOrderProducts))
        <input id="order_number" name="order_number" value="{{$currentOrder->first()->order_number}}" style="display: none;">
        <table class="tab">
                <tr>
                    <td>№</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Type</td>
                </tr>
                @foreach ($currentOrderProducts as $currentOrderProduct)
                <tr>
                    <td><input id="product_id_{{ $currentOrderProduct->product_id }}" name="product_id_{{ $currentOrderProduct->product_id }}" value="{{ $currentOrderProduct->product_id }}" style="display: none;">{{ $currentOrderProduct->product_id }} - <a href="/ordersinprogress/{{ $currentOrder->first()->order_number }}/editorder/delete/{{ $currentOrderProduct->product_id }}"><i>delete</i></a></td>
                    <td>{{ $currentOrderProduct->product->name }}</td>
                    <td>{{ $currentOrderProduct->product->description }}</td>
                    <td>{{ $currentOrderProduct->product->price }}</td>
                    <td><input type="number" id="{{ $currentOrderProduct->product_id }}" name="{{ $currentOrderProduct->product_id }}" min="0" value="{{ $currentOrderProduct->product_quantity }}"> of {{ $currentOrderProduct->product->quantity }}</td>
                    <td>{{ $currentOrderProduct->product->producttype->type_name }}</td>
                </tr>
                @endforeach
        </table>
        @endif
    </form>
    </div>
</x-layout>