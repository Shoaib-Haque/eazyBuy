<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductImages;
use App\Repository\Interfaces\IProductImageRepository;

class ProductImageRepository implements IProductImageRepository
{   
    protected $productimage = null;

    public function createOrUpdate( $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $productimage = new ProductImages;
            $productimage->product_id = $collection['product_id'];
            $productimage->img_name = $collection['img_name'];
            $productimage->save();
            return $productimage;
        }
        $productimage = ProductImages::find($id);
        $productimage->product_id = $collection['product_id'];
        $productimage->img_name = $collection['img_name'];
        $productimage->save();
        return $productimage;
    }
}
?>