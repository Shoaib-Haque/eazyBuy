<?php  
namespace App\Repository\Eloquent;

use App\Models\Products;
use App\Repository\Interfaces\IProductRepository;

class ProductRepository implements IProductRepository
{   
    protected $product = null;

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $product = new Products;
            $product->name = $collection['name'];
            $product->description = $collection['description'];
            $product->status = $collection['status'];
            $product->save();
            return $product;
        }
        $product = Products::find($id);
        $product->name = $collection['name'];
        $product->description = $collection['description'];
        $product->status = $collection['status'];
        $product->save();
        return $product;
    }

    public function searchRelatedProduct($term) {
        $data = Products::where('name','LIKE','%'.$term.'%')
                        ->take(5)
                        ->get();
        
        return $data;
    }

    public function getAllProduct() {
        $data = Products::select('id', 'name')
                        ->take(5)
                        ->get();

        return $data;
    }

    public function getProductById($proId) {
        $data = Products::where('id', '=', $proId)->first();        
        return $data;
    }
}
?>