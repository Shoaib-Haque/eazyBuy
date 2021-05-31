<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\BrandRequest;
use App\Repository\Interfaces\IBrandRepository;
use Illuminate\Support\Facades\DB;

class AdminBrandController extends Controller
{
    public $brand;

	public function __construct(IBrandRepository $brand) {
        $this->brand = $brand;
    }

    function index() {
    	$brandlist = $this->brand->getAllBrands();
    	return view('admin.catalog.brand.index', ['brandlist' => $brandlist]);
    }

    function add() {
    	return view('admin.catalog.brand.add');
    }

    function addBrand(BrandRequest $req) {
    	$result = $this->brand->createOrUpdate(NULL, array('name' => $req->name));
    	return redirect()->route('adminbrand.index');
    }

	function edit($bid) {
		$result = $this->brand->getBrandById($bid);
    	return view('admin.catalog.brand.edit', ['brand' => $result]);
    }

    function editBrand($bid, BrandRequest $req) {
    	$result = $this->brand->createOrUpdate($bid, array('name' => $req->name));
    	return redirect()->route('adminbrand.index');
    }  

    public function searchBrand(Request $request) {
        $term = $request->term;

        $queries = $this->brand->searchBrand($term);
        //$queries = DB::table('brands') //Your table name
        //    ->where('name', 'like', '%'.$term.'%') //Your selected row
        //    ->take(5)->get();
        $results = array();

        foreach ($queries as $query)
        {
            $results[] = ['id' => $query->id, 'value' => $query->name]; //you can take custom values as you want
        }
        return response()->json($results);
    }
}
