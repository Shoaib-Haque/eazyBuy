<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\CategoryRequest;
use App\Repository\Interfaces\IDepartmentRepository;
use App\Repository\Interfaces\ICategoryRepository;

class AdminCategoryController extends Controller
{
    public $department, $category;

	public function __construct(IDepartmentRepository $department, ICategoryRepository $category) {
        $this->department = $department;
        $this->category = $category;
    }

    function index() {
    	$categorylist = $this->category->getAllCategories();
    	return view('admin.catalog.category.index', ['categorylist' => $categorylist]);
    }

    function add() {
    	$departmentlist = $this->department->getAllDepartments();
    	return view('admin.catalog.category.add', ['departmentlist' => $departmentlist]);
    }

    function addCategory(CategoryRequest $req) {
    	$result = $this->category->createOrUpdate(NULL, array('title' => $req->title, 'department_id' => $req->department_id));
    	return redirect()->route('admincategory.index');
    }

	function edit($cid) {
		$result = $this->category->getCategoryById($cid);
        $departmentlist = $this->department->getAllDepartments();
    	return view('admin.catalog.category.edit',['category' => $result, 'departmentlist' => $departmentlist]);
    }

    function editCategory($cid, CategoryRequest $req) {
    	$result = $this->category->createOrUpdate($cid, array('title' => $req->title, 'department_id' => $req->department_id));
    	return redirect()->route('admincategory.index');
    }    
}
