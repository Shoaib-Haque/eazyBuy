<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerHomeController extends Controller
{
    function index() {
    	return view("customer.index");
    }
}