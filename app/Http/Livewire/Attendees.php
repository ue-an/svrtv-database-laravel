<?php

namespace App\Http\Livewire;

use App\Models\Attendee;
use Livewire\Component;

class Attendees extends Component
{
    public $attendees, $email, $last_name, $first_name, $mobile_no, $is_bonafied, $is_feast_attendee, $feast_name, $feast_district, $address, $city, $country, $user_id;
    public $updateMode = false;

    public function render()
    {
        $this->attendees = Attendee::all();
        return view('livewire.attendees');
    }

    private function resetInputFields() {
        
        $this->email = '';
        $this->last_name = '';
        $this->first_name = '';
        $this->mobile_no = '';
        //is_feast_attendee and feast_name are automatically filled based on feast tables if they have records
        $this->feast_district = '';
        $this->address = '';
        $this->city = '';
        $this->country = '';
    }

    public function store() {
        $validatedDate = $this->validate([
            'email' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'mobile_no',
            'feast_district',
            'address',
            'city',
            'country',
        ]);
  
        Attendee::create($validatedDate);
  
        session()->flash('message', 'Attendee Added Successfully.');
  
        $this->resetInputFields();
    }

    public function edit($id) {
        $attendee = Attendee::findOrFail($id);
        $this->user_id = $id;
        $this->email = $attendee->email;
        $this->last_name = $attendee->last_name;
        $this->first_name = $attendee->first_name;
        $this->mobile_no = $attendee->mobile_no;
        $this->feast_district = $attendee->feast_district;
        $this->address = $attendee->address;
        $this->city = $attendee->city;
        $this->country = $attendee->country;

        $this->updateMode = true;
    }

    public function cancel() {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update() {
        $validatedDate = $this->validate([
                'email' => 'required',
                'last_name' => 'required',
                'first_name' => 'required',
                'mobile_no',
                'feast_district',
                'address',
                'city',
                'country',
            ]);

        $attendee = Attendee::find($this->user_id);
        $attendee->update([
            'email'=>$this->email,
            'last_name'=>$this->last_name,
            'first_name'=>$this->first_name,
            'mobile_no'=>$this->mobile_no,
            'feast_district'=>$this->feast_district,
            'address'=>$this->address,
            'city'=>$this->city,
            'country'=>$this->country,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Attendee Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id) {
        Attendee::find($id)->delete();
        session()->flash('message', 'Attendee Deleted Successfully.');
    }
}
