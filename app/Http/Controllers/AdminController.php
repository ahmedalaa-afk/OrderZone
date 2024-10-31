<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        // Super Admin
        $this->middleware(['check_role:super_admin'])->only(['settings']);
        // Vendor Manager
        $this->middleware(['check_role:vendor_manager'])->only(['notifications']);
        $this->middleware(['check_role:vendor_manager'])->only(['vendors']);
        // Product Manager
        $this->middleware(['check_role:product_manager'])->only(['categories']);
        // User Manager
        $this->middleware(['check_role:user_manager'])->only(['users']);
    }
    public function index()
    {
        return view('admin.index');
    }
    public function settings()
    {
        return view('admin.settings');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function vendors()
    {
        return view('admin.vendors');
    }
    public function notifications()
    {
        return view('admin.notifications');
    }
    public function categories()
    {
        return view('admin.categories');
    }
    public function departments()
    {
        return view('admin.departments');
    }
    public function products()
    {
        return view('admin.products');
    }
    public function vendorsAnnouncement()
    {
        return view('admin.announcements');
    }

}
