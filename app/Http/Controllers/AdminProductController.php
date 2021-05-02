<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    function index() {
    	$productlist = DB::table('ckeditor')
    	            ->select('ckeditor.*')
       			    ->get();
        //$productlist['des'] = htmlspecialchars_decode($productlist['des']);
    	return view('admin.products', ['productlist'=>$productlist]);
    }

    function addproduct() {
    	return view('admin.addproduct');
    }

    function addck(Request $req) {
        $des = trim($req->des);
        $des = stripslashes($des);
        $des = htmlspecialchars($des);
    	DB::table('ckeditor')->insertGetId(
            ['des' => $des, 'name' => $req->name, 'image' => $req->image]
        );
    	return redirect()->route('adminproduct.index');
    }
}
