<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function __construct()
    {
        // User Manager
        $this->middleware(['check_role:user_manager'])->only(['users']);
    }
    public function users()
    {
        return view('admin.users');
    }
    public function userContacts(){
        return view('admin.contacts');
    }
}
