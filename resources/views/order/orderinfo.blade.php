<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <br>
    <h3>{{ $title }}</h3>
    <a href="/ordersinprogress">Return</a><br>
    @if($order_info->first()->status->id == 2)<a href="/ordersinprogress/{{ $order_info->first()->order_number }}/editorder">Edit</a><br>
    <a href="/ordersinprogress/{{ $order_info->first()->order_number }}/delete">Delete</a>@endif
    @if (!empty($order_info))
       <table class="tab">
                <tr>
                    <td>Characteristic</td>
                    <td>Value</td>
                </tr>
                <tr>
                    <td>Order number</td>
                    <td>{{ $order_info->first()->order_number }}</td>
                </tr>
                <tr>
                    <td>Status<a href="/ordersinprogress/{{ $order_info->first()->order_number }}"><i>(change)</i></a>:</td>
                    <td>{{ $order_info->first()->status->name }}</td>
                </tr>
                <tr>
                    <td>User:</td>
                    <td><a href="/users/{{ $order_info->first()->user->id }}">{{ $order_info->first()->user->name }}</a></td>
                </tr>
                <tr>
                    <td>Product list:</td>
                    <td>Total sum: {{ $order_info->first()->total_sum }}
                        @foreach ($products_info as $product)
                        <p>Number: {{ $product->product_id }}<br>Name: {{ $product->product->name }}<br>Description: {{ $product->product->description }}<br>Price: {{ $product->product->price }}<br>Quantity: {{ $product->product_quantity }}<br>Type: {{ $product->product->producttype->type_name }}
                        </p>
                        @endforeach
                    </td>
                </tr>
       </table>
    @endif


</x-layout>