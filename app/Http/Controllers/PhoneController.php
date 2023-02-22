<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class PhoneController extends Controller
{
    public function edit($id, Request $request) 
    {
        if ($request->has('phone_number')) 
        {
            $validatedData = $request->validate([
                'phone_number' => ['required','unique:phones', 'max:12'],
            ]);

            $phone = Phone::where('user_id', $id)->
                            first();
            $phone->phone_number = $request->input('phone_number');
            $phone->save();

            return redirect('/users/'.$id);
        }

        $currentPhone = Phone::select('phone_number')->
                               where('user_id', $id)->
                               first();

        return view('phone.edit', 
        [
                'title' => 'Edit phone number',
                'currentPhone'=>$currentPhone,
                'id'  => $id,
        ]);
    }
}
