<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\SubCategoryRequest;
use App\Repository\Interfaces\IdepartmentRepository;
use App\Repository\Interfaces\ICategoryRepository;
use App\Repository\Interfaces\ISubCategoryRepository;

class AdminSubCategoryController extends Controller
{
    public $subcategory, $category, $department;

	public function __construct(ISubCategoryRepository $subcategory, ICategoryRepository $category, 
								IDepartmentRepository $department) {
		$this->subcategory = $subcategory;
        $this->category = $category;
        $this->department = $department;
    }

    function index() {
    	$subcategorylist = $this->subcategory->getAllSubCategories();
    	return view('admin.catalog.subcategory.index', ['subcategorylist' => $subcategorylist]);
    }

    function add() {
    	$departmentlist = $this->department->getAllDepartments();
    	return view('admin.catalog.subcategory.add', ['departmentlist' => $departmentlist]);
    }

    function addSubCategory(Request $req) {
    	$result = $this->subcategory->createOrUpdate(NULL, array('title' => $req->title, 'category_id' => $req->category_id));
    	return redirect()->route('adminsubcategory.index');
    }

    function edit($sid) {
		$result = $this->subcategory->getSubCategoryById($sid);
        $departmentlist = $this->department->getAllDepartments();
        $categorylist = $this->category->getAllCategories();
    	return view('admin.catalog.subcategory.edit',['subcategory' => $result, 'departmentlist' => $departmentlist, 
    												  'categorylist' => $categorylist]);
    }

    function editSubCategory($sid, Request $req) {
    	$result = $this->subcategory->createOrUpdate($sid, array('title' => $req->title, 'category_id' => $req->category_id));
    	return redirect()->route('adminsubcategory.index');
    }

    function subCategoryByCategory(Request $req) {
        if($req->category_id){
            $result = $this->subcategory->subCategoryByCategory($req->category_id);
            if(count($result) >=1){
                echo '<option value="">Select Subcategory</option>';
                foreach($result as $key => $value){ 
                    echo '<option value="'.$value->id.'">'.$value->title.'</option>';
                }
            }
            else {
                echo '<option value="">No Subcategory</option>';
            }
        }
    }

    function checkDuplicate(Request $req) {
        $name = $req->name;
        $cid =  $req->cid;
        if (isset($this->subcategory->checkDuplicate($name, $cid)->id)) {
            return "Has Duplicate";
        }
        else {
            return "No Duplicate";
        }
    }
}
