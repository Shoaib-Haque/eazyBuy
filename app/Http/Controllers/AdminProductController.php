<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\Interfaces\IDepartmentRepository;

class AdminProductController extends Controller
{
    public $department;

    public function __construct(IDepartmentRepository $department) {
        $this->department = $department;
    }
    
    function index() {
    	return view('admin.catalog.product.index');
    }

    function add() {
        $departmentlist = $this->department->getAllDepartments();
    	return view('admin.catalog.product.add', ['departmentlist' => $departmentlist]);
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