<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductDetails;
use App\Repository\Interfaces\IProductDetailRepository;

class ProductDetailsRepository implements IProductDetailRepository
{   
    protected $productdetail = null;

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $productdetail = new ProductDetails;
            $productdetail->product_id = $collection['product_id'];
            $productdetail->model = $collection['model'];
            $productdetail->shipping_required = $collection['shipping_required'];
            $productdetail->minimum_order_quantity = $collection['minimum_order_quantity'];
            $productdetail->subtract_stock = $collection['subtract_stock'];
            $productdetail->number_of_items = $collection['number_of_items'];
            $productdetail->tax_class = $collection['tax_class'];
            $productdetail->tax_parcentage = $collection['tax_parcentage'];
            $productdetail->unit_of_measure = $collection['unit_of_measure'];
            $productdetail->created_at = $collection['created_at'];
            $productdetail->updated_at = $collection['updated_at'];
            $productdetail->save();
            return $productdetail;
        }
        $productdetail = ProductDetails::find($id);
        $productdetail->product_id = $collection['product_id'];
        $productdetail->model = $collection['model'];
        $productdetail->shipping_required = $collection['shipping_required'];
        $productdetail->minimum_order_quantity = $collection['minimum_order_quantity'];
        $productdetail->subtract_stock = $collection['subtract_stock'];
        $productdetail->number_of_items = $collection['number_of_items'];
        $productdetail->tax_class = $collection['tax_class'];
        $productdetail->tax_parcentage = $collection['tax_parcentage'];
        $productdetail->unit_of_measure = $collection['unit_of_measure'];
        $productdetail->created_at = $collection['created_at'];
        $productdetail->updated_at = $collection['updated_at'];
        $productdetail->save();
        return $productdetail;
    }
}
?>