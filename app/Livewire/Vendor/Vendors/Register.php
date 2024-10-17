<?php

namespace App\Livewire\Vendor\Vendors;

use App\Events\NewVendorRegisteredEvent;
use App\Livewire\Admin\Notifications\NotificationData;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Vendor;
use App\Notifications\NewVendorReisteredNotification;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Register extends Component
{
    use WithFileUploads;

    public $countries, $name, $email, $password, $password_confirmation, $phone,
        $identity_front, $identity_back, $country, $birth_date, $address;

    public function mount()
    {
        $this->countries = Country::all();
    }
    public function roles()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Vendor::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'phone' => ['nullable', 'string', 'max:255'],
            'identity_front' => ['required', 'mimes:jpg,png,jpeg'],
            'identity_back' => ['required', 'mimes:jpg,png,jpeg'],
            'birth_date' => ['required', 'date', 'before_or_equal:' . now()->subYears(25)->format('Y-m-d')],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'in:' . $this->countries->pluck('name')->implode(',')],
        ];
    }
    public function submit()
    {
        $data = $this->validate($this->roles());
        if ($data) {
            $path = 'vendors/images/' . str_replace(' ', '', $this->name) . '/';
            // Front Identity
            $extension_file_front = $this->identity_front->getClientOriginalExtension();
            $file_front_name = uuid_create() . '.' . $extension_file_front;
            $this->identity_front->storeAs($path, $file_front_name, 'public');
            $newPath = $path . $file_front_name;
            $data['identity_front'] = $newPath;

            // Back Identity
            $extension_file_back = $this->identity_back->getClientOriginalExtension();
            $file_back_name = uuid_create() . '.' . $extension_file_back;
            $this->identity_back->storeAs($path, $file_back_name, 'public');
            $newPath = $path . $file_back_name;
            $data['identity_back'] = $newPath;


            $vendor = Vendor::create($data);
            $vendor->assignRole('vendor');

            // Notification
            $admins = Admin::role('vendor_manager')->where('status', 'active')->get();
            Notification::send($admins, new NewVendorReisteredNotification($vendor));
            // refresh notification data
            $this->dispatch('refreshNotifications')->to(NotificationData::class);
            // Broadcast event
            NewVendorRegisteredEvent::dispatch();
            return to_route('vendor.request');
        }
    }
    public function render()
    {
        return view('vendor.vendors.register');
    }
}
