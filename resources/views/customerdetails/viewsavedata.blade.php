<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('view user') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        .button-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .go-back-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .go-back-button:hover {
            background-color: #45a049;
        }
        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #555;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #fff;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div>
        <table id='Table'>
            <thead>
                <tr>
                    <th>NIC</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $customer)
                    <tr>
                        <td>{{ $customer->NIC }}</td>
                        <td>{{ $customer->fullname }}</td>
                        <td>{{ $customer->getGenderDetails->gender }}</td>
                        <td>{{ $customer->dob }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->contactnumber }}</td>
                        <td>{{ $customer->email ?? '—' }}</td>
                        <td><a href="/edit-user/{{$customer->id}}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        </div>
    </div>
     <script>
  $(document).ready(function() {
    console.log('this is viw save data');
    $('#Table').DataTable();
  });
</script>
</x-app-layout>
