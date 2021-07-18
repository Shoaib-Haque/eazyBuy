<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductDiscounts;
use App\Repository\Interfaces\IProductDiscountRepository;

class ProductDiscountRepository implements IProductDiscountRepository
{   
    protected $productdiscount = null;

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $productdiscount = new ProductDiscounts;
            $productdiscount->product_id = $collection['product_id'];
            $productdiscount->discount_parcentage = $collection['discount_parcentage'];
            $productdiscount->minimum_order_quantity = $collection['minimum_order_quantity'];
            $productdiscount->start_date = $collection['start_date'];
            $productdiscount->end_date = $collection['end_date'];
            $productdiscount->save();
            return $productdiscount;
        }
        $productdiscount = ProductDiscounts::find($id);
        $productdiscount->product_id = $collection['product_id'];
        $productdiscount->discount_parcentage = $collection['discount_parcentage'];
        $productdiscount->minimum_order_quantity = $collection['minimum_order_quantity'];
        $productdiscount->start_date = $collection['start_date'];
        $productdiscount->end_date = $collection['end_date'];
        $productdiscount->save();
        return $productdiscount;
    }
}
?>