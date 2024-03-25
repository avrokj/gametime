<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ...

    public function update(UpdateUserRequest $request, User $user): View
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if (auth()->user()->can('edit-passwords')) {
            $user->password = $request->password;
        }

        $user->save();

        return view('users.show')->with([
            'user' => $user,
        ]);
    }

    // ...
}
