<?php

namespace App\Livewire\Admin\Vendors;

use App\Models\Vendor;
use App\Notifications\SendVendorMeetingUrlNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class VendorsMeeting extends Component
{
    public $date,$url,$vendor;
    protected $listeners=['meetVendor'];
    public function rules(){
        return [
            'date' => 'required|date|after_or_equal:today',
            'url' => 'required|url',
        ];
    }
    public function meetVendor($id){
        $this->vendor = Vendor::where('id', $id)->first();
        $this->dispatch('showMeetingModal');
    }
    public function submit(){
        $this->validate($this->rules());
        // send meeting details to vendor
        Notification::sendNow($this->vendor,new SendVendorMeetingUrlNotification($this->date,$this->url));
        // reset variables
        $this->reset(['date','url']);
        // refresh vendor data
        $this->dispatch('refreshVendors')->to(VendorsData::class);
        // toggle modal
        $this->dispatch('showMeetingModal');
    }
    public function render()
    {
        return view('admin.vendors.vendors-meeting');
    }
}
