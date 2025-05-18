<?php

namespace App\Http\Controllers;
use App\Models\Gender;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;

class HomeController extends Controller
{

    //
    public function index(){
        if(Auth::id()){
            $userType=Auth::user()->userType;

            
            if($userType==='admin'){
    
                return redirect()->route('admin-dashboard');
            }

            elseif($userType==='user'){
                 
                 return view('user.viewdata');
            }

            else {
            // Handle unexpected user types
            Auth::logout();
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }
        }
    }



    public function dashboard(CustomerController $customer_controller)
    {
         $customer= $customer_controller->viewDataByUser();
         return view('user.viewdata',['customer'=>$customer]);
    }

     public function admindashboard(CustomerController $customer_controller)
    {
          $data= $customer_controller->analytics();
         return view('Admin.adminDashboard',['data'=>$data]);
    
    }

    

    
}
