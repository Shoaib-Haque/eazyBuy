<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\DepartmentRequest;
use App\Repository\Interfaces\IDepartmentRepository;

class AdminDepartmentController extends Controller
{
	public $department;

	public function __construct(IDepartmentRepository $department) {
        $this->department = $department;
    }

    function index() {
    	$departmentlist = $this->department->getAllDepartments();
    	return view('admin.catalog.department.index', ['departmentlist' => $departmentlist]);
    }

    function add() {
    	return view('admin.catalog.department.add');
    }

    function addDepartment(DepartmentRequest $req) {
    	$result = $this->department->createOrUpdate(NULL, array('title' => $req->title));
    	return redirect()->route('admindepartment.index');
    }

	function edit($did) {
		$result = $this->department->getDepartmentById($did);
    	return view('admin.catalog.department.edit',['department' => $result]);
    }

    function editDepartment($did, DepartmentRequest $req) {
    	$result = $this->department->createOrUpdate($did, array('title' => $req->title));
    	return redirect()->route('admindepartment.index');
    } 

    function checkDuplicate(Request $req) {
        $name = $req->name;
        if (isset($this->department->checkDuplicate($name)->id)) {
            return "Has Duplicate";
        }
        else {
            return "No Duplicate";
        }
    }
}
