<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Producttype;
use App\Models\User;

class ProductController extends Controller
{
    public function add() 
    {
        $product = new Product;

        $product->name = 'Dell';
        $product->description = 'Good 3';
        $product->price = 434000;
        $product->quantity = 9;
        $product->producttype_id = 3;

        $product->save();

        echo "ADD_product";
    }

    public function get_user() 
    {
        $users = User::all();

        return view('product.get_user', 
        [
                'title' => 'Add order',
                'users'=>$users,
        ]);
    }

    public function addorder(Request $request)
    {
        $messageforprice = ' ';
        if (($request->has('name') and $request->input('name') != '') and 
            ($request->has('type') and $request->input('type') > 0) and 
            ($request->has('minprice') and $request->input('minprice') != 0) and 
            ($request->has('maxprice') and $request->input('maxprice') != 0)) {
            if ($request->input('minprice') < $request->input('maxprice')) {
                $params_list = Product::select('name','producttype_id')->get();
                $isContainName = false;
                $params = [];

                foreach ($params_list as $param) {
                    $isContainName = Str::contains($param['name'], $request->input('name'));
                    if($isContainName){
                        array_push($params, $param['name']);
                    }
                }

                $products = Product::whereIn('name', $params)->
                                     whereBetween('price', 
                                        [$request->input('minprice'), $request->input('maxprice')])->
                                     where('producttype_id', $request->input('type'))->
                                     get(); 
                             } else {
                                $products = Product::all();
                                $messageforprice = 'Minprice is more than maxprice';
                            }
        } elseif (($request->has('name') and $request->input('name') != '') and 
                  ($request->has('type') and $request->input('type') > 0) and 
                  ($request->has('minprice') and $request->input('minprice') != 0)) {
            $params_list = Product::select('name','producttype_id')->get();
            $isContainName = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainName = Str::contains($param['name'], $request->input('name'));
                if($isContainName){
                    array_push($params, $param['name']);
                }
            }
            $products = Product::whereIn('name', $params)->
                                 where('price','>=', $request->input('minprice'))->
                                 where('producttype_id', $request->input('type'))->
                                 get();
        } elseif (($request->has('name') and $request->input('name') != '') and 
                  ($request->has('type') and $request->input('type') > 0) and 
                  ($request->has('maxprice') and $request->input('maxprice') != 0)) {
            $params_list = Product::select('name','producttype_id')->get();
            $isContainName = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainName = Str::contains($param['name'], $request->input('name'));
                if($isContainName){
                    array_push($params, $param['name']);
                }
            }
            $products = Product::whereIn('name', $params)->
                                 where('price','<=', $request->input('maxprice'))->
                                 where('producttype_id', $request->input('type'))->
                                 get();
        } elseif (($request->has('name') and $request->input('name') != '') and 
                  ($request->has('minprice') and $request->input('minprice') != 0) and 
                  ($request->has('maxprice') and $request->input('maxprice') != 0)) {
            if ($request->input('minprice') < $request->input('maxprice')) {
                $params_list = Product::select('name')->get();
                $isContainName = false;
                $params = [];

                foreach ($params_list as $param) {
                    $isContainName = Str::contains($param['name'], $request->input('name'));
                    if($isContainName){
                        array_push($params, $param['name']);
                    }
                }
                $products = Product::whereIn('name', $params)->
                                     whereBetween('price', 
                                        [$request->input('minprice'), $request->input('maxprice')])->
                                        get(); 
                                 } else {
                                    $products = Product::all();
                                    $messageforprice = 'Minprice is more than maxprice';
                                }
        } elseif (($request->has('name') and $request->input('name') != '') and 
                  ($request->has('minprice') and $request->input('minprice') != 0)) {
            $params_list = Product::select('name')->get();
            $isContainName = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainName = Str::contains($param['name'], $request->input('name'));
                if($isContainName){
                    array_push($params, $param['name']);
                }
            }
            $products = Product::whereIn('name', $params)->
                                 where('price','>=', $request->input('minprice'))
                                 ->get();
        } elseif (($request->has('name') and $request->input('name') != '') and 
                  ($request->has('maxprice') and $request->input('maxprice') != 0)) {
            $params_list = Product::select('name')->get();
            $isContainName = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainName = Str::contains($param['name'], $request->input('name'));
                if($isContainName){
                    array_push($params, $param['name']);
                }
            }
            $products = Product::whereIn('name', $params)->
                                 where('price','<=', $request->input('maxprice'))
                                 ->get();
        } elseif (($request->has('type') and $request->input('type') > 0) and 
                  ($request->has('minprice') and $request->input('minprice') != 0) and 
                  ($request->has('maxprice') and $request->input('maxprice') != 0)) {
            if ($request->input('minprice') < $request->input('maxprice')) {
                $products = Product::where('producttype_id', $request->input('type'))->
                                     whereBetween('price',
                                     [$request->input('minprice'), $request->input('maxprice')])->
                                     get();
                                 } else {
                                    $products = Product::all();
                                    $messageforprice = 'Minprice is more than maxprice';
                                 }
        } elseif (($request->has('name') and $request->input('name') != '') and 
                  ($request->has('type') and $request->input('type') > 0)) {
                $params_list = Product::select('name','producttype_id')->get();
                $isContainName = false;
                $params = [];

                foreach ($params_list as $param) {
                    $isContainName = Str::contains($param['name'], $request->input('name'));
                    if($isContainName){
                        array_push($params, $param['name']);
                    }
                }

                $products = Product::whereIn('name', $params)->
                                     where('producttype_id', $request->input('type'))->
                                     get(); 
        } 
        elseif (($request->has('type') and $request->input('type') > 0) and 
                ($request->has('minprice') and $request->input('minprice') != 0)) {
            $products = Product::where('producttype_id', $request->input('type'))->
                                 where('price','>=', $request->input('minprice'))->
                                 get();
        } elseif (($request->has('type') and $request->input('type') > 0) and 
                  ($request->has('maxprice') and $request->input('maxprice') != 0)) {
            $products = Product::where('producttype_id', $request->input('type'))->
                                 where('price','<=', $request->input('maxprice'))->
                                 get();
        } elseif ($request->has('name') and $request->input('name') != '') {
            $params_list = Product::select('name')->get();
            $isContainName = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainName = Str::contains($param['name'], $request->input('name'));
                if($isContainName){
                    array_push($params, $param['name']);
                }
            }
            $products = Product::whereIn('name', $params)->get();
        } elseif ($request->has('type') and $request->input('type') > 0) {
            $products = Product::where('producttype_id', $request->input('type'))->
                                 get();
        } elseif (($request->has('minprice') and $request->input('minprice') != 0) and 
                  ($request->has('maxprice') and $request->input('maxprice') != 0)) {
            if ($request->input('minprice') < $request->input('maxprice')) {
                $products = Product::whereBetween('price',
                                     [$request->input('minprice'), $request->input('maxprice')])->
                                     get();
                                 } else {
                                    $products = Product::all();
                                    $messageforprice = 'Minprice is more than maxprice';
                                 }
        } elseif ($request->has('minprice') and $request->input('minprice') != 0) {
            $products = Product::where('price','>=', $request->input('minprice'))->
                                 get();
        } elseif ($request->has('maxprice') and $request->input('maxprice') != 0) {
            $products = Product::where('price','<=', $request->input('maxprice'))->
                                 get();
        } else {
            $products = Product::all();
        }

            $producttypes  = Producttype::all();
            if($request->has('user')){
            $id  = $request->input('user');
            $user = User::whereId($id)->first();
        }
            return view('product.add', [
                'title' => 'Add order for '.$user->name,
                'products'=>$products,
                'producttypes'=>$producttypes,
                'user' => $user,
                'messageforprice' => $messageforprice,
            ]);
        }
}
