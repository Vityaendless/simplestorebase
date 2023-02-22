<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Street;
use App\Models\Building;
use App\Models\Appartment;

class AddressController extends Controller
{
    public function show($id)
    {
        $addresses = Address::where('user_id','=', $id)->get();
        $user = User::select('name')->whereId($id)->first();
        return view('address.show', 
            [
                'title' => 'Info about '.$user->name.' addresses',
                'addresses'  => $addresses,
                'id'  => $id,
            ]);
    }

    public function add($id, Request $request) 
    {
        if ($request->has('country') and
            $request->has('city') and
            $request->has('street') and
            $request->has('building') and
            ($request->has('appartment') and ($request->input('appartment') != 0))) 
        {
            $validatedData = $request->validate([
                'country' => ['required'],
                'city' => ['required'],
                'street' => ['required'],
                'building' => ['required'],
                'appartment' => ['required'],
            ]);

            $address = new Address;
            $address->user_id = $id;
            $isEmpty = Address::where('user_id','=',$id)->
                                where('isEmpty','=','1')->
                                where('isMain','=','1')->
                                value('isEmpty');
            if ($isEmpty == 1) {
                $address->isMain = 1;
            } 
            else {
                $address->isMain = 0;
            }
            $address->isEmpty = 0;
            $address->country_id = $request->input('country');
            $address->city_id = $request->input('city');
            $address->street_id = $request->input('street');
            $address->building_id = $request->input('building');
            $address->appartment_id = $request->input('appartment');
            $address->save();

            $deleteEmptyAddress = Address::where('isMain','=','1')->
                                           where('isEmpty','=','1')->
                                           where('user_id','=',$id)->
                                           delete();

            return redirect('/users/'.$id.'/addresses');
        }

        $countries = Country::select('id','name')->get();
        $cities = City::all();
        $streets = Street::all();
        $buildings = Building::all();
        $appartments = Appartment::all();
        return view('address.add', 
        [
                'title' => 'Add address',
                'countries'=>$countries,
                'cities'=>$cities,
                'streets'=>$streets,
                'buildings'=>$buildings,
                'appartments'=>$appartments,
                'id'  => $id,
        ]);
    }

    public function setAsMain($user_id, $address_id) 
    {
        $oldMainAddress = Address::where('user_id','=',$user_id)->
                                   where('isMain', '=', 1)->
                                   first();
        $oldMainAddress->isMain = 0;
        $oldMainAddress->save();

        $address = Address::whereId($address_id)->
                            where('user_id', '=', $user_id)->
                            first();
        $address->isMain = 1;
        $address->save();

        return redirect('/users/'.$user_id.'/addresses');
    }

    public function delete($user_id, $address_id) 
    {
        $address = Address::whereId($address_id)->
                            where('user_id', '=', $user_id)->
                            first();
        $isMainAddress = Address::whereId($address_id)->
                                  where('user_id', '=', $user_id)->
                                  value('isMain');
        $countOfAddresses = Address::where('user_id','=',$user_id)->
                                     count();

        if ($countOfAddresses > 1) {
            if ($isMainAddress == 1) {
                $nextIsMain = Address::where('id','>',$address_id)->
                                   where('user_id', '=', $user_id)->
                                   first();
                $nextIsMain->isMain = 1;
                $nextIsMain->save();

                $address->delete();
            } else {
                $address->delete();
            }
        } else {
            $address->delete();

            $deletedEmpty = Address::withTrashed()->
                                     where('isEmpty', '=', 1)->
                                     where('user_id', '=', $user_id)->
                                     first();

            if ($deletedEmpty) {
                $deletedEmpty->restore();
            }
            else{
                $newEmpty = new Address;
                $newEmpty->user_id = $user_id;
                $newEmpty->isMain = 1;
                $newEmpty->isEmpty = 1;
                $newEmpty->country_id = 0;
                $newEmpty->city_id = 0;
                $newEmpty->street_id = 0;
                $newEmpty->building_id = 0;
                $newEmpty->appartment_id = 0;
                $newEmpty->save();
            }
        }

        return redirect('/users/'.$user_id.'/addresses');
    }

    public function edit($user_id, $address_id, Request $request) 
    {
            if ($request->has('country') and
            $request->has('city') and
            $request->has('street') and
            $request->has('building') and
            ($request->has('appartment') and ($request->input('appartment') != 0))) 
        {
            $validatedData = $request->validate([
                'country' => ['required'],
                'city' => ['required'],
                'street' => ['required'],
                'building' => ['required'],
                'appartment' => ['required'],
            ]);

            $address = Address::whereId($address_id)->
                             where('user_id', $user_id)->
                             first();
            $address->country_id = $request->input('country');
            $address->city_id = $request->input('city');
            $address->street_id = $request->input('street');
            $address->building_id = $request->input('building');
            $address->appartment_id = $request->input('appartment');

            $address->save();

            return redirect('/users/'.$user_id.'/addresses');
        }

        $currentAddress = Address::whereId($address_id)->
                                   where('user_id', $user_id)->
                                   first();
        $countries = Country::select('id','name')->get();
        $cities = City::all();
        $streets = Street::all();
        $buildings = Building::all();
        $appartments = Appartment::all();
        return view('address.edit', 
        [
                'title' => 'Edit address',
                'countries'=>$countries,
                'cities'=>$cities,
                'streets'=>$streets,
                'buildings'=>$buildings,
                'appartments'=>$appartments,
                'currentAddress'=>$currentAddress,
                'id'=>$user_id,
                'address_id'=>$address_id,
        ]);
    }
}
