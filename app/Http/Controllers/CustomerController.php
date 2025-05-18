<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


use Pest\ArchPresets\Custom;
use phpDocumentor\Reflection\Types\Nullable;

class CustomerController extends Controller
{
    //
    public function index(){
        return view('admin.adminhome');
    }

    
    
    public function savecustomer(Request $request){
        $validatedData = $request->validate([
        'fullname' => 'required|string|max:255',
        'NIC' => 'required|string|unique:customer,NIC',
        'dob' => 'required|date|before:today',
        'address' => 'required|string|max:255',
        'contactnumber' => 'required|digits:10',
        'email' => 'nullable|email|max:255',
        
        ]);

        $validatedData['gender_id'] = $validatedData['gender_id'] ?? 1;

        $newCustomer=Customer::create($validatedData);
        $customer=Customer::all();
        return redirect()->back();
        
    }

    public function viewCustomer(){
            // dd($customer);
         $customer=$this->viewDataByUser();
        
        return view('customerdetails.viewsavedata',['customer'=>$customer]);
    }

    public function viewDataByUser(){
       return  $customer=Customer::with('getGenderDetails')->get();
        // return view('user.viewdata',['customer'=>$customer]);
    }

    public function editcustomer($id){
     $customer=Customer::find($id);
    return view('customerdetails.edit',['customer'=>$customer]);
    }

    public function analytics()
    {
        $customers = Customer::all();

        // Total
        $total = $customers->count();

        // Age groups
        $ageGroups = [
            '18-30' => 0,
            '31-50' => 0,
            '51+' => 0,
        ];

        // Birth months
        $birthMonths = array_fill(1, 12, 0);

        // Gender breakdown (optional)
        $genders = [
            'Male' => 0,
            'Female' => 0,
            'Other' => 0,
        ];

        foreach ($customers as $customer) {
            // Age
            if ($customer->dob) {
                $age = Carbon::parse($customer->dob)->age;

                if ($age >= 18 && $age <= 30) $ageGroups['18-30']++;
                elseif ($age >= 31 && $age <= 50) $ageGroups['31-50']++;
                elseif ($age > 50) $ageGroups['51+']++;

                // Birth month
                $month = Carbon::parse($customer->dob)->month;
                $birthMonths[$month]++;
            }

            // Optional: gender tracking if gender_id maps to a known value
            if ($customer->gender_id == 1) $genders['Male']++;
            elseif ($customer->gender_id == 2) $genders['Female']++;
            else $genders['Other']++;
        }

        return  [
            'total' => $total,
            'ageGroups' => $ageGroups,
            'birthMonths' => $birthMonths,
            'genders' => $genders
        ];
    }


     public function updatecustomer(Customer $customer,Request $request){
            $validatedData = $request->validate([
        'fullname' => 'required|string|max:255',
        'NIC' => [
            'required',
            'string',
            Rule::unique('customer', 'NIC')->ignore($customer->id),
        ],
      
        'dob' => 'required|date|before:today',
        'address' => 'required|string|max:255',
        'contactnumber' => 'required|digits:10',
        'email' => 'nullable|email|max:255',
        
        ]);
        $customer->update($validatedData);
       
        return redirect()->route('view-user');
        
    }




    
}
