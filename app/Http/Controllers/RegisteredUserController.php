<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File as File;
use Illuminate\Validation\Rules\Password as Password;

class RegisteredUserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes = request()->validate([
            'name' => ['required'],
            'email'      => ['required', 'email'],
            'password'   => ['required', Password::min(6), 'confirmed']
        ]);

        $employerAttributes = request()->validate([
            'employer' => ['required'],
            'logo' =>['required', File::types(['png', 'jpg', 'jpeg', 'webp'])]
        ]);

        $user = User::create($userAttributes);

        $logoPath= $request->logo->store('logos');

        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath
        ]);

        Auth::login($user);

        return redirect('/');
    }

}
