<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>
    <p>{{ $messageforsum }}</p>
    <p>{{ $messageifquantityisbig }}</p>
    <div class="form">
        <form action="" method="POST">
            @csrf
            @php if(isset($statuses)) { @endphp
            <label for="status">Status: </label>
            <select id="status" name="status">
                <option id="status" value="0" selected="selected" ></option>
                @foreach($statuses as $status)
                <option id="status" value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
            @php } @endphp
            <label for="minsum">Min sum: </label><input type="number" id="minsum" name="minsum" value="0">
            <label for="maxsum">Max sum: </label><input type="number" id="maxsum" name="maxsum" value="0">
            @php if(isset($users)) { @endphp
            <label for="user">User: </label>
            <select id="user" name="user">
                <option id="user" value="0" selected="selected" ></option>
                @foreach($users as $user)
                <option id="user" value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                @endforeach
            </select>
            @php } @endphp
            <input type="submit" value="Find">
        </form>
    </div>
    @if (!empty($orders))
       <table class="tab">
                <tr>
                    <td>№</td>
                    <td>Status</td>
                    <td>Sum</td>
                    <td>User</td>
                </tr>
                    @foreach ($orders as $order)
                         <tr>
                             <td>{{ $order->order_number }} <a href="/ordersinprogress/{{ $order->order_number }}/orderinfo">See info</a>@if($order->status_id == 2) - <a href="/ordersinprogress/{{ $order->order_number }}/delete">Delete order</a>@endif</td>
                             <td>{{ $order->status->name }} @if($order->status_id == 2)<a href="/ordersinprogress/{{ $order->order_number }}">Change status</a>@endif</td>
                             <td>{{ $order->total_sum }}</td>
                             <td><a href="/users/{{ $order->user->id }}">{{ $order->user->name }}</a></td>
                         </tr>
                    @endforeach
       </table>
    @endif


</x-layout>