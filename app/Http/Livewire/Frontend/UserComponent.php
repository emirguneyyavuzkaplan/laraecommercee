<?php

namespace App\Http\Livewire\Frontend;


use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class UserComponent extends Component
{
    public function render()
    {
        return view('livewire.frontend.user-component');
    }

    public function updateUserDetails(Request $request)
    {
        $request->validate([
            'name'=>['required','string'],
            'phone'=>['required','digits:10'],
            'pin_code'=>['required','digits:6'],
            'address'=>['required','string','max:449'],

        ]);


        $user=User::findOrFail(Auth::user()->id);
        $user->update([
           'name'=>$request->user->id,
        ]);

        $user->userDetail()->updateOrCreate([
            'user_id'=>$request->user_id,
            ],
            [
                'phone'=>$request->phone,
                'pin_code'=>$request->pin_code,
                'address'=>$request->address,
            ]

        );
        return redirect()->back()->with('message','User Profile Updated');
    }
}
