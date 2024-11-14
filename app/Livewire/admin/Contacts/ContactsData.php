<?php

namespace App\Livewire\Admin\Contacts;

use App\Models\Contact;
use Livewire\Component;

class ContactsData extends Component
{
    public $search;
    protected $listeners = ['refreshContacts' => '$refresh'];
    public function UpdateingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $contacts = Contact::where('email', 'like', '%' . $this->search . '%')->paginate(10);
        return view('admin.contacts.contacts-data', compact('contacts'));
    }

}
