<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Person') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    

           
            

    <form action="{{route('customerdetails.save')}}" method="POST">
        <!-- CSRF token for Laravel -->
        @csrf
        @method('post')

        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" name="fullname" id="fullname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="NIC" class="form-label">National ID Number</label>
            <input type="text" name="NIC" id="NIC" class="form-control" required pattern="[0-9]{12}" title="Must be a valid Sri Lankan NIC">
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control" required max="{{ date('Y-m-d') }}">
        </div>




        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="contactnumber" class="form-label">Contact Number</label>
            <input type="tel" name="contactnumber" id="contactnumber" class="form-control" required pattern="^(\d{9}[VXvx]|\d{12})$" title="10-digit contact number">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>

       
    </form>
        </div>
    </div>
</x-app-layout>
