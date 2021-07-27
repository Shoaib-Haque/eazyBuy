<?php  
namespace App\Repository\Eloquent;

use App\Models\RelatedProducts;
use App\Repository\Interfaces\IRelatedProductRepository;

class RelatedProductRepository implements IRelatedProductRepository
{   
    protected $related_product = null;

    public function createOrUpdate( $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $related_product = new RelatedProducts;
            $related_product->product_id = $collection['product_id'];
            $related_product->related_product_id = $collection['related_product_id'];
            $related_product->save();
            return $related_product;
        }
        $related_product = RelatedProducts::find($id);
        $related_product->product_id = $collection['product_id'];
        $related_product->related_product_id = $collection['related_product_id'];
        $related_product->save();
        return $related_product;
    }
}
?>