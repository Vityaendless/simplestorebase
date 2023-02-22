<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Status;

class OrderController extends Controller
{
    public function show_in_progress(Request $request) 
    {
        $users = User::all();
        $messageforsum = ' ';
        $messageifquantityisbig = $request->session()->get('message');
        if (($request->has('user') and $request->input('user') > 0) and 
            ($request->has('minsum') and $request->input('minsum') != 0) and 
            ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            if ($request->input('minsum') < $request->input('maxsum')) {
                $orders = Order::select('order_number','status_id', 
                                        DB::raw('SUM(sum) as total_sum'),
                                        'user_id')->
                                 where('status_id', 2)->
                                 where('user_id', $request->input('user'))->
                                 groupBy('order_number')->
                                 havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                                 havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                                 get();
                             } else {
               $orders = Order::select('order_number','status_id', 
                                       DB::raw('SUM(sum) as total_sum'),
                                       'user_id')->
                                where('status_id', 2)->
                                groupBy('order_number')->
                                get();
                $messageforsum = 'Minsum is more than maxsum';
            }
        } elseif (($request->has('user') and $request->input('user') > 0) and 
                  ($request->has('minsum') and $request->input('minsum') != 0)) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('status_id', 2)->
                            where('user_id', $request->input('user'))->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                            get();
        } elseif (($request->has('user') and $request->input('user') > 0) and 
                  ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('status_id', 2)->
                            where('user_id', $request->input('user'))->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                            get();
        } elseif ($request->has('user') and $request->input('user') > 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                             where('status_id', 2)->
                             where('user_id', $request->input('user'))->
                             groupBy('order_number')->
                             get();
        } elseif (($request->has('minsum') and $request->input('minsum') != 0) and 
                  ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            if ($request->input('minsum') < $request->input('maxsum')) {
                $orders = Order::select('order_number','status_id', 
                                        DB::raw('SUM(sum) as total_sum'),
                                        'user_id')->
                                 where('status_id', 2)->
                                 groupBy('order_number')->
                                 havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                                 havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                                 get();
                             } else {
               $orders = Order::select('order_number','status_id', 
                                       DB::raw('SUM(sum) as total_sum'),
                                       'user_id')->
                                where('status_id', 2)->
                                groupBy('order_number')->
                                get();
                $messageforsum = 'Minsum is more than maxsum';
            }
        } elseif ($request->has('minsum') and $request->input('minsum') != 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('status_id', 2)->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                            get();
        } elseif ($request->has('maxsum') and $request->input('maxsum') != 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('status_id', 2)->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                            get();
        } else {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                             where('status_id', 2)->
                             groupBy('order_number')->
                             get();
        }

        return view('order.show', 
            [
                'title' => 'Orders in progress',
                'orders'=>$orders,
                'users'=>$users,
                'messageforsum' => $messageforsum,
                'messageifquantityisbig' => $messageifquantityisbig,
            ]);
    }

    public function show_all_orders(Request $request) 
    {
        $statuses = Status::all();
        $users = User::all();

        $messageforsum = ' ';
        $messageifquantityisbig='';
        if (($request->has('user') and $request->input('user') > 0) and 
            ($request->has('status') and $request->input('status') > 0) and 
            ($request->has('minsum') and $request->input('minsum') != 0) and 
            ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            if ($request->input('minsum') < $request->input('maxsum')) {
                $orders = Order::select('order_number','status_id', 
                                        DB::raw('SUM(sum) as total_sum'),
                                        'user_id')->
                                 where('user_id', $request->input('user'))->
                                 where('status_id', $request->input('status'))->
                                 groupBy('order_number')->
                                 havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                                 havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                                 get();
                             } else {
               $orders = Order::select('order_number','status_id', 
                                       DB::raw('SUM(sum) as total_sum'),
                                       'user_id')->
                                groupBy('order_number')->
                                get();
                $messageforsum = 'Minsum is more than maxsum';
            }
        } elseif (($request->has('user') and $request->input('user') > 0) and 
                  ($request->has('status') and $request->input('status') > 0)) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('user_id', $request->input('user'))->
                            where('status_id', $request->input('status'))->
                            groupBy('order_number')->
                            get();
        } elseif (($request->has('user') and $request->input('user') > 0) and 
                  ($request->has('minsum') and $request->input('minsum') != 0) and 
                  ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            if ($request->input('minsum') < $request->input('maxsum')) {
                $orders = Order::select('order_number','status_id', 
                                        DB::raw('SUM(sum) as total_sum'),
                                        'user_id')->
                                 where('user_id', $request->input('user'))->
                                 groupBy('order_number')->
                                 havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                                 havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                                 get();
                             } else {
               $orders = Order::select('order_number','status_id', 
                                       DB::raw('SUM(sum) as total_sum'),
                                       'user_id')->
                                groupBy('order_number')->
                                get();
                $messageforsum = 'Minsum is more than maxsum';
            }
        } elseif (($request->has('user') and $request->input('user') > 0) and 
                 ($request->has('minsum') and $request->input('minsum') != 0)) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('user_id', $request->input('user'))->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                            get();
        } elseif (($request->has('user') and $request->input('user') > 0) and 
                 ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('user_id', $request->input('user'))->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                            get();
        } elseif (($request->has('status') and $request->input('status') > 0) and 
                  ($request->has('minsum') and $request->input('minsum') != 0) and 
                  ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            if ($request->input('minsum') < $request->input('maxsum')) {
                $orders = Order::select('order_number','status_id', 
                                        DB::raw('SUM(sum) as total_sum'),
                                        'user_id')->
                                 where('status_id', $request->input('status'))->
                                 groupBy('order_number')->
                                 havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                                 havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                                 get();
                             } else {
               $orders = Order::select('order_number','status_id', 
                                       DB::raw('SUM(sum) as total_sum'),
                                       'user_id')->
                                groupBy('order_number')->
                                get();
                $messageforsum = 'Minsum is more than maxsum';
            }
        } elseif (($request->has('status') and $request->input('status') > 0) and 
                  ($request->has('minsum') and $request->input('minsum') != 0)) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('status_id', $request->input('status'))->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                            get();
        } elseif (($request->has('status') and $request->input('status') > 0) and 
                  ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('status_id', $request->input('status'))->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                            get();
        } elseif ($request->has('user') and $request->input('user') > 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                             where('user_id', $request->input('user'))->
                             groupBy('order_number')->
                             get();
        } elseif ($request->has('status') and $request->input('status') > 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                             where('status_id', $request->input('status'))->
                             groupBy('order_number')->
                             get();
        } elseif (($request->has('minsum') and $request->input('minsum') != 0) and 
                  ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            if ($request->input('minsum') < $request->input('maxsum')) {
                $orders = Order::select('order_number','status_id', 
                                        DB::raw('SUM(sum) as total_sum'),
                                        'user_id')->
                                 groupBy('order_number')->
                                 havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                                 havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                                 get();
                             } else {
               $orders = Order::select('order_number','status_id', 
                                       DB::raw('SUM(sum) as total_sum'),
                                       'user_id')->
                                groupBy('order_number')->
                                get();
                $messageforsum = 'Minsum is more than maxsum';
            }
        } elseif ($request->has('minsum') and $request->input('minsum') != 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                            get();
        } elseif ($request->has('maxsum') and $request->input('maxsum') != 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                            get();
        } else {
            $orders = Order::select('order_number','status_id', 
                                    DB::raw('SUM(sum) as total_sum'),
                                    'user_id')->
                             groupBy('order_number')->
                             get();
        }

        return view('order.show', 
            [
                'title' => 'All orders',
                'orders'=>$orders,
                'statuses'=>$statuses,
                'users'=>$users,
                'messageforsum'=>$messageforsum,
                'messageifquantityisbig'=>$messageifquantityisbig,
            ]);
    }

    public function changeStatus($order_number) 
    {
        $currentOrder = Order::where('order_number', $order_number)->
                               get();
        foreach ($currentOrder as $rowInOrder) {
            $rowInOrder->status_id = 1;
            $rowInOrder->save();
        }

        return redirect('/ordersinprogress');
    }

     public function delete($order_number) 
    {
        $currentOrder = Order::where('order_number', $order_number)->
                               get();
        foreach ($currentOrder as $rowInOrder) {
            $newQuantity = $rowInOrder->product->quantity+$rowInOrder->product_quantity;
            $rowInOrder->product->quantity = $newQuantity;
            $rowInOrder->product->save();
            $rowInOrder->delete();
        }

        return redirect('/ordersinprogress');
    }

    public function orderInfo($order_number)
    {

        $order_info = Order::select('order_number','status_id', 
                                 DB::raw('SUM(sum) as total_sum'),
                                 'user_id')->
                         where('order_number', $order_number)->
                         groupBy('order_number')->
                         get();
        $products_info = Order::where('order_number', $order_number)
                                ->get();
        return view('order.orderinfo', 
            [
                'title' => 'Info about order № '.$order_number,
                'order_info'  => $order_info,
                'products_info'  => $products_info,
            ]);
    }

    public function createorder(Request $request) 
    {
        $lastOrder = Order::orderBy('id', 'desc')->
                            get()->
                            value('order_number');
        $newOrder = $lastOrder+1;

        $lastProduct = Product::orderBy('id', 'desc')->get()->value('id');
        for ($i=1; $i <= $lastProduct; $i++) {
            if (($i == $request->input('product_id_'.$i)) and ($request->input($i) != 0)) {
                $order = new Order;

                $order->order_number = $newOrder;
                $order->status_id = 2;
                $order->product_id = $request->input('product_id_'.$i);
                $order->product_quantity = $request->input($i);

                $product = Product::where('id', $request->input('product_id_'.$i))->
                                    first();
                if($product->quantity >= $request->input($i)){
                $newQuantity = $product->quantity - $request->input($i);
                $product->quantity = $newQuantity;
                $product->save();
            } else {
                $request->session()->flash('message', 'Quantity which you want in pos '.$product->id.' - '.$product->name.' is bigger than quantity in the store. We didnt add it');
                continue;
            }
                $order->sum = $request->input($i) * $product->price;
                $order->user_id = $request->input('user');
                $order->save();
            }
        }

        return redirect('/ordersinprogress');
    }

    public function orderslist($id, Request $request)
    {
        $statuses = Status::all();
        $selectedUser = User::whereId($id)->first();

        $messageforsum = ' ';
        $messageifquantityisbig='';
        if (($request->has('status') and $request->input('status') > 0) and 
            ($request->has('minsum') and $request->input('minsum') != 0) and 
            ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            if ($request->input('minsum') < $request->input('maxsum')) {
                $orders = Order::select('order_number','status_id', 
                                        DB::raw('SUM(sum) as total_sum'),
                                        'user_id')->
                                 where('user_id', $id)->
                                 where('status_id', $request->input('status'))->
                                 groupBy('order_number')->
                                 havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                                 havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                                 get();
                             } else {
               $orders = Order::select('order_number','status_id', 
                                       DB::raw('SUM(sum) as total_sum'),
                                       'user_id')->
                                where('user_id', $id)->
                                groupBy('order_number')->
                                get();
                $messageforsum = 'Minsum is more than maxsum';
            }
        } elseif (($request->has('status') and $request->input('status') > 0) and 
                  ($request->has('minsum') and $request->input('minsum') != 0)) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('user_id', $id)->
                            where('status_id', $request->input('status'))->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                            get();
        } elseif (($request->has('status') and $request->input('status') > 0) and 
                  ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('user_id', $id)->
                            where('status_id', $request->input('status'))->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                            get();
        } elseif ($request->has('status') and $request->input('status') > 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                             where('user_id', $id)->
                             where('status_id', $request->input('status'))->
                             groupBy('order_number')->
                             get();
        } elseif (($request->has('minsum') and $request->input('minsum') != 0) and 
                  ($request->has('maxsum') and $request->input('maxsum') != 0)) {
            if ($request->input('minsum') < $request->input('maxsum')) {
                $orders = Order::select('order_number','status_id', 
                                        DB::raw('SUM(sum) as total_sum'),
                                        'user_id')->
                                 where('user_id', $id)->
                                 groupBy('order_number')->
                                 havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                                 havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                                 get();
                             } else {
               $orders = Order::select('order_number','status_id', 
                                       DB::raw('SUM(sum) as total_sum'),
                                       'user_id')->
                                where('user_id', $id)->
                                groupBy('order_number')->
                                get();
                $messageforsum = 'Minsum is more than maxsum';
            }
        } elseif ($request->has('minsum') and $request->input('minsum') != 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('user_id', $id)->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) >= ?', [$request->input('minsum')])->
                            get();
        } elseif ($request->has('maxsum') and $request->input('maxsum') != 0) {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                            where('user_id', $id)->
                            groupBy('order_number')->
                            havingRaw('SUM(sum) <= ?', [$request->input('maxsum')])->
                            get();
        } else {
            $orders = Order::select('order_number','status_id', 
                                     DB::raw('SUM(sum) as total_sum'),
                                     'user_id')->
                             where('user_id', $id)->
                             groupBy('order_number')->
                             get();
        }

        return view('order.show', 
            [
                'title' => 'Orders from '.$selectedUser->name,
                'orders'  => $orders,
                'statuses'=>$statuses,
                'messageforsum'=>$messageforsum,
                'messageifquantityisbig'=>$messageifquantityisbig,
            ]);
    }

    public function edit($order_number, Request $request) 
    {
        $messageifquantityisbig = '';

        $lastProduct = Product::orderBy('id', 'desc')->get()->value('id');

        for ($i=1; $i <= $lastProduct; $i++) {
            $order = Order::where('order_number', $order_number)->
                            where('product_id', $request->input('product_id_'.$i))->
                            first();
            if (($request->has($i)) and 
               ($request->input($i) != $order->product_quantity) and 
               ($i == $request->input('product_id_'.$i))) {
                $product = Product::where('id', $request->input('product_id_'.$i))->
                                    first();
                if (($product->quantity + $order->product_quantity) >= $request->input($i)){
                        if ($request->input($i) > $order->product_quantity) {
                            $newQuantity = $product->quantity - ($request->input($i) - $order->product_quantity);
                            $product->quantity = $newQuantity;
                        } else {
                            $newQuantity = $product->quantity + ($order->product_quantity - $request->input($i));
                            $product->quantity = $newQuantity;
                        }
                            $product->save();
                    } else {
                        $messageifquantityisbig = 'Quantity which you want in pos '.$product->id.' - '.$product->name.' is bigger than quantity in the store. We didnt add it';
                        continue;
                    }
                $order->product_quantity = $request->input($i);
                $order->sum = $request->input($i) * $product->price;
                $order->save();
                }
            }

        $currentOrder = Order::select('order_number','status_id', 
                                 DB::raw('SUM(sum) as total_sum'),
                                 'user_id')->
                               where('order_number', $order_number)->
                               groupBy('order_number')->
                               get();
        $currentOrderProducts = Order::where('order_number', $order_number)->
                                       get();
        return view('order.edit', 
        [
                'title' => 'Edit order',
                'currentOrder'=>$currentOrder,
                'currentOrderProducts'=>$currentOrderProducts,
                'messageifquantityisbig'=>$messageifquantityisbig,
        ]);
    }

    public function delete_product($order_number, $id) 
    {
        $currentProduct = Order::where('order_number', $order_number)->
                                 where('product_id', $id)->
                                 first();
        $newQuantity = $currentProduct->product->quantity+$currentProduct->product_quantity;
        $currentProduct->product->quantity = $newQuantity;
        $currentProduct->product->save();

        $currentProduct->delete();
        $currentOrder = Order::where('order_number', $order_number)->
                               first();

        if (!empty($currentOrder)) {
            return redirect('/ordersinprogress/'.$order_number.'/editorder');
        } else {
            return redirect('/ordersinprogress');
        }
    }

}
