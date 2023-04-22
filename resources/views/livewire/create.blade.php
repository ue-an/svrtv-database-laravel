<form>
 <div class="form-group">
  <label for="exampleFormControlInput1">Email:</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email" wire:model="email">
  @error('email') <span class="text-danger">{{ $message }}</span>@enderror
 </div>

 <div class="form-group">
  <label for="exampleFormControlInput2">Last Name:</label>
  <textarea type="email" class="form-control" id="exampleFormControlInput2" placeholder="Enter Last Name" wire:model="last_name"></textarea>
  @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
 </div>

 <div class="form-group">
  <label for="exampleFormControlInput3">First Name:</label>
  <textarea type="email" class="form-control" id="exampleFormControlInput3" placeholder="Enter First Name" wire:model="first_name"></textarea>
  @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
 </div>

 <div class="form-group">
  <label for="exampleFormControlInput4">Mobile No.:</label>
  <textarea type="email" class="form-control" id="exampleFormControlInput4" placeholder="Enter Mobile No." wire:model="mobile_no"></textarea>
  @error('mobile_no') <span class="text-danger">{{ $message }}</span>@enderror
 </div>

 <div class="form-group">
  <label for="exampleFormControlInput5">Feast District</label>
  <textarea type="email" class="form-control" id="exampleFormControlInput5" placeholder="Enter Feast District" wire:model="feast_district"></textarea>
  @error('feast_district') <span class="text-danger">{{ $message }}</span>@enderror
 </div>

 <div class="form-group">
  <label for="exampleFormControlInput6">Address</label>
  <textarea type="email" class="form-control" id="exampleFormControlInput6" placeholder="Enter Address" wire:model="address"></textarea>
  @error('address') <span class="text-danger">{{ $message }}</span>@enderror
 </div>

 <div class="form-group">
  <label for="exampleFormControlInput7">City</label>
  <textarea type="email" class="form-control" id="exampleFormControlInput7" placeholder="Enter City" wire:model="city"></textarea>
  @error('city') <span class="text-danger">{{ $city }}</span>@enderror
 </div>

 <div class="form-group">
  <label for="exampleFormControlInput8">Country</label>
  <textarea type="email" class="form-control" id="exampleFormControlInput8" placeholder="Enter Country" wire:model="country"></textarea>
  @error('country') <span class="text-danger">{{ $country }}</span>@enderror
 </div>
 <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>