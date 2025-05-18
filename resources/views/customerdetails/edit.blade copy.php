<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Customer Details</h2>
    

    <form action="{{route('customerdetails.update',['customer'=>$customer])}}" method="post">
        <!-- CSRF token for Laravel -->
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" name="fullname" id="fullname" class="form-control" required value="{{$customer->fullname}}">
        </div>

        <div class="mb-3">
            <label for="NIC" class="form-label">National ID Number</label>
            <input type="text" name="NIC" id="NIC" class="form-control" required pattern="[0-9]{9}[VvXx]" title="Must be a valid Sri Lankan NIC (e.g., 123456789V)" value="{{$customer->NIC}}">
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control" required max="{{ date('Y-m-d') }} "value="{{$customer->dob}}">
        </div>




        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control" required value="{{$customer->address}}"></textarea>
        </div>

        <div class="mb-3">
            <label for="contactnumber" class="form-label">Contact Number</label>
            <input type="tel" name="contactnumber" id="contactnumber" class="form-control" required pattern="[0-9]{10}" title="10-digit contact number"value="{{$customer->contactnumber}}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$customer->email}}">
        </div>

        <button type="submit" class="btn btn-primary">Save Updated Changes</button>

       
    </form>
</div>
</body>
</html>
