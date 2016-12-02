<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use User;

class UserController extends Controller
{
    public function edit()
    {
        return view('edit-profile');
    }

    public function update(Request $request)
    { 
        if ($this->user->validate($request->only('name'), 'update')) {
            $this->user->name = $request->name;
            $this->user->avatar = $request->avatar;
            $this->user->save();
        } 
        return view('error')->withErrors($this->user->valid());
    }
}
