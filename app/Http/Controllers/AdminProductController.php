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
    	return view('admin.catalog.product.index', ['productlist'=>$productlist]);
    }

    function add() {
    	return view('admin.catalog.product.add');
    }

    /*
    function addck(Request $req) {
        $des = trim($req->des);
        $des = stripslashes($des);
        $des = htmlspecialchars($des);
        DB::table('ckeditor')->insertGetId(
            ['des' => $des, 'name' => $req->name, 'image' => $req->image]
        );
        return redirect()->route('adminproduct.index');
    }
    <table>
        @foreach($productlist as $productlist)
            <tr>
                <td>{!! html_entity_decode($productlist->des, ENT_QUOTES, 'UTF-8') !!} </td>
            </tr>
        @endforeach
    </table>*/
}
