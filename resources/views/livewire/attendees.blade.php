<div>
   @if (session()->has('message'))
   <div class="alert alert-success">
    {{ session('message') }}
   </div>
   @endif

   @if ($updateMode)
       @include('livewire.update')
    @else
        @include('livewire.create')
   @endif

   {{-- <table class="table table-bordered mt-5"> --}}
    <table class="table table-striped table-hover mx-auto w-auto">
    <thead>
        <tr>
            <tr>
                <th>UserID</th>
                <th>E-Mail</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Mobile</th>
                <th>Deliverable</th>
                <th>Action</th>
            </tr>
        </tr>
        <tbody>
            @foreach ($attendees as $att)
                <tr>
                    <td>{{ $att['user_id']}}</td>
                    <td>{{ $att['email']}}</td>
                    <td>{{ $att['last_name']}}</td>
                    <td>{{ $att['first_name']}}</td>
                    <td>{{ $att['mobile_no']}}</td>
                    <td>{{ $att['is_bonafied']}}</td>
                    <td>
                        <button wire:click="edit({{ $att->user_id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $att->user_id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </thead>
   </table>
</div>
