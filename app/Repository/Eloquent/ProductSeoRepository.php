<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductSeo;
use App\Repository\Interfaces\IProductSeoRepository;

class ProductSeoRepository implements IProductSeoRepository
{   
    protected $productseo = null;

    public function createOrUpdate( $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $productseo = new ProductSeo;
            $productseo->product_id = $collection['product_id'];
            $productseo->seo = $collection['seo'];
            $productseo->save();
            return $productseo;
        }
        $productseo = ProductSeo::find($id);
        $productseo->product_id = $collection['product_id'];
        $productseo->seo = $collection['seo'];
        $productseo->save();
        return $productseo;
    }
}
?>