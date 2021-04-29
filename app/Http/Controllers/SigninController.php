<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\IAdminRepository;
use App\Repository\Interfaces\ICustomerRepository;
use Illuminate\Http\Request;

class SigninController extends Controller
{
	public $admin;
    public $customer;
    
    public function __construct(IAdminRepository $admin, ICustomerRepository $customer) {
        $this->admin = $admin;
        $this->customer = $customer;
    }

    function index() {
    	return view('signin.index');
    }

	public function signin(Request $req) {
        if (isset($this->admin->getAdminByEmailPassword($req->email, $req->password)->id)) {
            $result = $this->admin->getAdminByEmailPassword($req->email, $req->password);
            $req->session()->put('adminid', $result->id);
            $req->session()->put('adminname', $result->firstname." ".$result->lastname);
            return redirect()->route('admin.index');
        }
        else if (isset($this->customer->getCustomerByEmailPassword($req->email, $req->password)->id)) {
            $result = $this->customer->getCustomerByEmailPassword($req->email, $req->password);
            $req->session()->put('customerid', $result->id);
            $req->session()->put('customername', $result->name);
            return redirect()->route('customer.index');
        }
        else {
            $req->session()->flash('msg', '! Invalid Email or Password');
            return redirect()->route('signin.index');
        }
	}
}
