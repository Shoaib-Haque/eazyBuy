<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductFeatures;
use App\Repository\Interfaces\IProductFeatureRepository;

class ProductFeatureRepository implements IProductFeatureRepository
{   
    protected $productfeature = null;

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $productfeature = new ProductFeatures;
            $productfeature->product_id = $collection['product_id'];
            $productfeature->tag = $collection['tag'];
            $productfeature->feature = $collection['information'];
            $productfeature->save();
            return $productfeature;
        }
        $productfeature = ProductFeatures::find($id);
        $productfeature->product_id = $collection['product_id'];
        $productfeature->tag = $collection['tag'];
        $productfeature->feature = $collection['information'];
        $productfeature->save();
        return $productfeature;
    }
}
?>