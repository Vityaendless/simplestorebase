<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Phone;
use App\Models\Address;

class UserController extends Controller
{
    public function search(Request $request)
    {
        if (($request->has('name') and $request->input('name') != '') and
            ($request->has('email') and $request->input('email') != '') and
            ($request->has('phone') and $request->input('phone') != '')) {
            $params_list = User::select('name','email', 'phones.phone_number')->
                                 leftJoin('phones', 'user_id', '=', 'users.id')->
                                 get();
            $isContainName = false;
            $isContainEmail = false;
            $isContainPhone = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainName = Str::contains($param['name'], $request->input('name'));
                $isContainEmail = Str::contains($param['email'], $request->input('email'));
                $isContainPhone = Str::contains($param['phone_number'], $request->input('phone'));
                if($isContainName){
                    array_push($params, $param['name']);
                }
                if($isContainEmail){
                    array_push($params, $param['email']);
                }
                if($isContainPhone){
                    array_push($params, $param['phone_number']);
                }
            }

            $users = User::leftJoin('phones', 'user_id', '=', 'users.id')->
                           whereIn('name', $params)->
                           whereIn('email', $params)->
                           whereIn('phone_number', $params)
                           ->get();
        }
        elseif (($request->has('name') and $request->input('name') != '') and 
                ($request->has('email') and $request->input('email') != '')) {
            $params_list = User::select('name','email')->get();
            $isContainName = false;
            $isContainEmail = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainName = Str::contains($param['name'], $request->input('name'));
                $isContainEmail = Str::contains($param['email'], $request->input('email'));
                if($isContainName){
                    array_push($params, $param['name']);
                }
                if($isContainEmail){
                    array_push($params, $param['email']);
                }
            }

            $users = User::whereIn('name', $params)->
                           whereIn('email', $params)->
                           get();
        }
        elseif (($request->has('name') and $request->input('name') != '') and  
                ($request->has('phone') and $request->input('phone') != '')) {
            $params_list = User::select('name', 'phones.phone_number')->
                                 leftJoin('phones', 'user_id', '=', 'users.id')
                                 ->get();
            $isContainName = false;
            $isContainPhone = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainName = Str::contains($param['name'], $request->input('name'));
                $isContainPhone = Str::contains($param['phone_number'], $request->input('phone'));
                if($isContainName){
                    array_push($params, $param['name']);
                }
                if($isContainPhone){
                    array_push($params, $param['phone_number']);
                }
            }

            $users = User::leftJoin('phones', 'user_id', '=', 'users.id')->
                           whereIn('name', $params)->
                           whereIn('phone_number', $params)->
                           get();
        }
        elseif (($request->has('email') and $request->input('email') != '') and 
                ($request->has('phone') and $request->input('phone') != '')) {
            $params_list = User::select('email', 'phones.phone_number')->
                                 leftJoin('phones', 'user_id', '=', 'users.id')
                                 ->get();
            $isContainEmail = false;
            $isContainPhone = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainEmail = Str::contains($param['email'], $request->input('email'));
                $isContainPhone = Str::contains($param['phone_number'], $request->input('phone'));
                if($isContainEmail){
                    array_push($params, $param['email']);
                }
                if($isContainPhone){
                    array_push($params, $param['phone_number']);
                }
            }

            $users = User::leftJoin('phones', 'user_id', '=', 'users.id')->
                           whereIn('email', $params)->
                           whereIn('phone_number', $params)->
                           get();
        }
        elseif ($request->has('name') and $request->input('name') != '') {
            $params_list = User::select('name')->get();
            $isContainName = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainName = Str::contains($param['name'], $request->input('name'));
                if($isContainName){
                    array_push($params, $param['name']);
                }
            }

            $users = User::whereIn('name', $params)->get();
        }
        elseif ($request->has('email') and $request->input('email') != '') {
            $params_list = User::select('email')->get();
            $isContainEmail = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainEmail = Str::contains($param['email'], $request->input('email'));
                if($isContainEmail){
                    array_push($params, $param['email']);
                }
            }

            $users = User::whereIn('email', $params)->
                           orderBy('id')
                           ->get();
        }
        elseif ($request->has('phone') and $request->input('phone') != '') {
            $params_list = Phone::select('phone_number')->get();
            $isContainPhone = false;
            $params = [];

            foreach ($params_list as $param) {
                $isContainPhone = Str::contains($param['phone_number'], $request->input('phone'));
                if($isContainPhone){
                    array_push($params, $param['phone_number']);
                }
            }

            $users = User::leftJoin('phones', 'user_id', '=', 'users.id')->
                           whereIn('phone_number', $params)
                           ->get();
        }
        else {
            $users = User::all();
        }

        return view('user.search', 
            [
                'title' => 'User search',
                'users'  => $users,
            ]);
    }

    public function info($id)
    {
        $user = User::whereId($id)->first();
        return view('user.info', 
            [
                'title' => 'Info about user '.$user->name,
                'user'  => $user,
            ]);
    }

    public function add(Request $request) 
    {

        $check = 0;
        if ($request->has('firstname') and
            $request->has('secondname') and
            $request->has('email') and
            $request->has('phone_number')) 
        {
            $validatedData = $request->validate([
                'firstname' => ['required', 'max:20'],
                'secondname' => ['required', 'max:20'],
                'email' => ['required','unique:users', 'max:40'],
                'phone_number' => ['required','unique:phones', 'max:12'],
            ]);
        

            $user = new User;
            $user->name = $request->input('firstname').' '.$request->input('secondname');
            $user->email = $request->input('email');
            $user->save();

            $phone = new Phone;
            $phone->phone_number = $request->input('phone_number');
            $phone->user_id = $user->id;
            $phone->save();

            $address = new Address;
            $address->user_id = $user->id;
            $address->save();

            $check = 1;
        }

        return view('user.add', 
        [
                'title' => 'Add user',
                'check'  => $check,
        ]);
    }

    public function editmail($id, Request $request) 
    {
        if ($request->has('email')) 
        {
            $validatedData = $request->validate([
                'email' => ['required','unique:users', 'max:40'],
            ]);

            $email = User::where('id', $id)->
                            first();
            $email->email = $request->input('email');
            $email->save();

            return redirect('/users/'.$id);
        }

        $currentEmail = User::select('email')->
                               where('id', $id)->
                               first();

        return view('user.editmail', 
        [
                'title' => 'Edit email',
                'currentEmail'=>$currentEmail,
                'id'  => $id,
        ]);
    }

    public function editname($id, Request $request) 
    {
        if ($request->has('firstname') and
            $request->has('secondname')) 
        {
            $validatedData = $request->validate([
                'firstname' => ['required', 'max:20'],
                'secondname' => ['required', 'max:20'],
            ]);

            $name = User::where('id', $id)->
                            first();
            $name->name = $request->input('firstname').
                          ' '.
                          $request->input('secondname');
            $name->save();

            return redirect('/users/'.$id);
        }

        $currentName = User::select('name')->
                               where('id', $id)->
                               first();

        return view('user.editname', 
        [
                'title' => 'Edit name',
                'currentName'=>$currentName,
                'id'  => $id,
        ]);
    }
}
