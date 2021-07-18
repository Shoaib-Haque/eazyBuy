<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductDimensions;
use App\Repository\Interfaces\IProductDimensionRepository;

class ProductDimensionRepository implements IProductDimensionRepository
{   
    protected $productdimension = null;

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $productdimension = new ProductDimensions;
            $productdimension->product_id = $collection['product_id'];
            $productdimension->length_class = $collection['length_class'];
            $productdimension->length = $collection['length'];
            $productdimension->width = $collection['width'];
            $productdimension->height = $collection['height'];
            $productdimension->save();
            return $productdimension;
        }
        $productdimension = ProductDimensions::find($id);
        $productdimension->product_id = $collection['product_id'];
        $productdimension->length_class = $collection['length_class'];
        $productdimension->length = $collection['length'];
        $productdimension->width = $collection['width'];
        $productdimension->height = $collection['height'];
        $productdimension->save();
        return $productdimension;
    }
}
?>