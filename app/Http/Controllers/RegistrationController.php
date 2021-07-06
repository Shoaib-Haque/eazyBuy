<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\RegistrationRequest;
use App\Repository\Interfaces\ICustomerRepository;

class RegistrationController extends Controller
{
    function index() {
    	return view("registration/index");
    }

    public $customer;
    
    public function __construct(ICustomerRepository $customer)
    {
        $this->customer = $customer;
    }

    function registration(RegistrationRequest $req) {
    	$result = $this->customer->create(array('name' => $req->name, 'email' => $req->email, 
    		                                    'password' => $req->password));
        if ($result->id) {
            $req->session()->put('customerid', $result->id);
            $req->session()->put('customername', $result->name);
            return redirect()->route('customer.index');
        }
    }

    function checkDuplicate(Request $req) {
        $email = $req->email;

        if (isset($this->customer->checkDuplicate($email)->id)) {
            return "Has Duplicate";
        }
        else {
            return "No Duplicate";
        }
    }
}
