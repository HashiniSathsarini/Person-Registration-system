<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Saved Customers Table -->
            <div class="mt-8">
                <h1 class="text-2xl font-bold text-center text-green-600 mb-6">Saved Customers</h1>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-400">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-400 px-4 py-2">NIC</th>
                                <th class="border border-gray-400 px-4 py-2">Full Name</th>
                                <th class="border border-gray-400 px-4 py-2">Gender</th>
                                <th class="border border-gray-400 px-4 py-2">Date of Birth</th>
                                <th class="border border-gray-400 px-4 py-2">Address</th>
                                <th class="border border-gray-400 px-4 py-2">Contact Number</th>
                                <th class="border border-gray-400 px-4 py-2">Email</th>
                            </tr>
                        </thead>
                        <body>
                            
                        </tbody>
                    </table>
                </div>

                <!-- Optional Go Back Button -->
                {{-- <div class="text-center mt-4">
                    <a href="{{ route('customerdetails.save') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-bold">Go Back</a>
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
