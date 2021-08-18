<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interfaces\IProductRepository;
use App\Repository\Interfaces\IProductInventoryRepository;
use App\Repository\Interfaces\IProductImageRepository;
use App\Repository\Interfaces\IOptionImageRepository;

class CustomerHomeController extends Controller
{
	public $product, $productInventory, $productImage;

	public function __construct(IProductRepository $product, IProductInventoryRepository $productInventory, 
		IProductImageRepository $productImage) {
        $this->product = $product;
        $this->productInventory = $productInventory;
        $this->productImage = $productImage;
    }

    function index() {
    	$proList = $this->product->getAllProduct();
    	foreach ($proList as $key => $value) {
    		$value['price'] = $this->productInventory->getPrice($value['id'])['unit_selling_price'];
            $value['image'] = $this->productImage->getProductImageById($value['id'])[0]['img_name'];
    	}
        
        return response()->json($proList);
    }
}
