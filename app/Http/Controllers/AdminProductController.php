<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\Interfaces\IDepartmentRepository;
use App\Repository\Interfaces\ISizeTypeRepository;

class AdminProductController extends Controller
{
    public $department, $sizeType;

    public function __construct(IDepartmentRepository $department, ISizeTypeRepository $sizeType) {
        $this->department = $department;
        $this->sizeType = $sizeType;
    }
    
    function index() {
    	return view('admin.catalog.product.index');
    }

    function add() {
        $departmentlist = $this->department->getAllDepartments();
        $sizetypelist = $this->sizeType->getAllSizeTypes();
    	return view('admin.catalog.product.add', ['departmentlist' => $departmentlist, 'sizetypelist' => $sizetypelist]);
    }

    /* 
    ck decouple editor text saving indo db
    function addck(Request $req) {
        $des = trim($req->des);
        $des = stripslashes($des);
        $des = htmlspecialchars($des);
        DB::table('ckeditor')->insertGetId(
            ['des' => $des, 'name' => $req->name, 'image' => $req->image]
        );
        return redirect()->route('adminproduct.index');
    }

    ck decouple editor text show from DB
    <table>
        @foreach($productlist as $productlist)
            <tr>
                <td>{!! html_entity_decode($productlist->des, ENT_QUOTES, 'UTF-8') !!} </td>
            </tr>
        @endforeach
    </table>
    */
}
