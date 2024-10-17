<?php

namespace App\Livewire\Admin\Vendors;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;

class VendorsData extends Component
{
    use WithPagination;

    protected $listeners = ['refreshVendors' => '$refresh', 'vendorStatus','deleteVendor'];

    public $search;
    public $vendor;

    function UpdatingSearch()
    {
        $this->resetPage();
    }

    public function vendorStatus($id)
    {
        $this->vendor = Vendor::where('id', $id)->first();
        if ($this->vendor->status == 'not_approved') {
            $this->vendor->status = 'approved';
            $this->vendor->save();
        } else {
            $this->vendor->status = 'not_approved';
            $this->vendor->save();
        }
    }
    public function deleteVendor($id){
        Vendor::where('id', $id)->delete();
        $this->dispatch('refreshVendors');
    }
    public function render()
    {
        $vendors = Vendor::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        })
            ->whereNotNull('accepted_at')
            ->orderBy('status', 'desc')
            ->paginate(10);

        return view('admin.vendors.vendors-data', compact('vendors'));
    }
}
