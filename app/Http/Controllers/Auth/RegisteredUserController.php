<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /*)*
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        $userType = $request->input('usertype');

        $user = new User([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
            'usertype' => $userType
        ]);

        switch ($userType) {
            case 'student':
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', new AllowedEmailDomain, 'unique:'.User::class],
                    'levelofstudy' => ['required'],
                    'facultyofstudy' => ['required']
                ]);
                $user->email = Str::lower($request->input('email'));
                $user->levelofstudy = $request->input('levelofstudy');
                $user->facultyofstudy = $request->input('facultyofstudy');
                $user->active = true;
                break;
            case 'apiit staff':
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', new AllowedEmailDomain, 'unique:'.User::class],
                    'stafftype' => ['required'],
                ]);
                $user->stafftype = $request->input('stafftype');
                $user->email = Str::lower($request->input('email'));
                $user->active = true;
                break;
            case 'alumni':
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                    'identity' => [ 'required', 'string', 'max:255', 'unique:'.User::class]
                ]);
                $user->email = Str::lower($request->input('email'));
                $user->identity = $request->input('identity');
                $user->active = false;
                break;
        }

        $user->save();

        event(new Registered($user));

        Auth::login($user);
        if ($user->active === false) {
            return redirect('/')->with('alumni_msg','This account is currently not active. Please wait for approval (aprox. 24 -72 hours)');
        } else {
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
