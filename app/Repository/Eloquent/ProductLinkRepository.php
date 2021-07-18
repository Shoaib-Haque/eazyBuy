<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductLinks;
use App\Repository\Interfaces\IProductLinkRepository;

class ProductLinkRepository implements IProductLinkRepository
{   
    protected $productlink = null;

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $productlink = new ProductLinks;
            $productlink->product_id = $collection['product_id'];
            $productlink->brand_id = $collection['brand_id'];
            $productlink->sub_category_id = $collection['sub_category_id'];
            $productlink->save();
            return $productlink;
        }
        $productlink = ProductLinks::find($id);
        $productlink->product_id = $collection['product_id'];
        $productlink->brand_id = $collection['brand_id'];
        $productlink->sub_category_id = $collection['sub_category_id'];
        $productlink->save();
        return $productlink;
    }
}
?>