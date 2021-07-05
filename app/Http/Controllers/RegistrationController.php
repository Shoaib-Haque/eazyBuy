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
    //onclick="return validation()"

    function unique_id($limit)
	{
	  return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
	}

    function registration(RegistrationRequest $req) {
    	$id = $this->unique_id(11);
    	$result = $this->customer->create(array('id' => $id, 'name' => $req->name, 'email' => $req->email, 
    		                                    'password' => $req->password));
    	$req->session()->put('customerid', $result->id);
        return redirect('/customerhome');
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
