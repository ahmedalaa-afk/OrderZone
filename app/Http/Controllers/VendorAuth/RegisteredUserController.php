<?php

namespace App\Http\Controllers\VendorAuth;

use App\Events\NewVendorRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('vendor.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Vendor::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'phone' => ['nullable', 'string', 'max:255'],
        //     'id_card_front_photo' => ['required', 'mime:jpg,png,jpeg'],
        //     'id_card_back_photo' => ['required', 'mime:jpg,png,jpeg'],
        //     'country' => ['required', 'string', 'max:255'],
        // ]);

        // $user = Vendor::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'phone' => $request->phone,
        //     'id_card_front_photo',
        //     'id_card_back_photo',
        //     'country',
        // ]);

        // event(new Registered($user));

        // Broadcast event
        NewVendorRegisteredEvent::dispatch();

        // Auth::login($user);

        return to_route('vendor.request');
    }
}
