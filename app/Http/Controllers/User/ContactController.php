<?php

namespace App\Http\Controllers\User;

use App\Events\UserSendContactNotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserSendBlogRequest;
use App\Http\Requests\UserSendContactRequest;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Contact;
use App\Notifications\UserSendContactNotification;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware(['auth', 'checkUserStatus']);
    }

    public function contact()
    {
        $total = $this->cartService->getToalCartPrice();
        return view('user.contact', compact('total'));
    }

    public function store(UserSendContactRequest $request){
        if($request->email == Auth::user()->email){
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'user_id' => $request->user()->id
            ]);

            return redirect()->route('user.contact')->with('success', 'Your message has been sent successfully.');
            $admins = Admin::role('user_manager')->where('status', 'active')->get();
            Notification::send($admins, new UserSendContactNotification());
            UserSendContactNotificationEvent::dispatch();
        }
        return redirect()->route('user.contact')->with('error', 'Email does not match with your account.');
    }
}
