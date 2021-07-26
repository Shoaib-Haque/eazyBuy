<?php  
namespace App\Repository\Eloquent;

use App\Models\Productweights;
use App\Repository\Interfaces\IProductWeightRepository;

class ProductWeightRepository implements IProductWeightRepository
{   
    protected $productweight = null;

    public function createOrUpdate( $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $productweight = new Productweights;
            $productweight->product_id = $collection['product_id'];
            $productweight->weight_class = $collection['weight_class'];
            $productweight->weight = $collection['weight'];
            $productweight->save();
            return $productweight;
        }
        $productweight = Productweights::find($id);
        $productweight->product_id = $collection['product_id'];
        $productweight->weight_class = $collection['weight_class'];
        $productweight->weight = $collection['weight'];
        $productweight->save();
        return $productweight;
    }
}
?>