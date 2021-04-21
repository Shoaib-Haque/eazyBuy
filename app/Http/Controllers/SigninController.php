<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\IAdminRepository;
use Illuminate\Http\Request;

class SigninController extends Controller
{
	public $admin;
    
    public function __construct(IAdminRepository $admin)
    {
        $this->admin = $admin;
    }

    function index() {
    	return view('signin.index');
    }

	public function signin(Request $req)
	{
	   	$result = $this->admin->getAdminByEmailPassword($req->email, $req->password);
        $req->session()->put('adminid', $result->id);
        return redirect()->route('admin.index');
	}
}
