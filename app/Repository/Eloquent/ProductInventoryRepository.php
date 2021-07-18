<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductInventory;
use App\Repository\Interfaces\IProductInventoryRepository;

class ProductInventoryRepository implements IProductInventoryRepository
{   
    protected $product_inventory = null;

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $product_inventory = new ProductInventory;
            $product_inventory->product_id = $collection['product_id'];
            $product_inventory->sku = $collection['sku'];
            $product_inventory->stock_quantity = $collection['stock_quantity'];
            $product_inventory->unit_price = $collection['unit_price'];
            $product_inventory->save();
            return $product_inventory;
        }
        $product_inventory = ProductInventory::find($id);
        $product_inventory->product_id = $collection['product_id'];
        $product_inventory->sku = $collection['sku'];
        $product_inventory->stock_quantity = $collection['stock_quantity'];
        $product_inventory->unit_price = $collection['unit_price'];
        $product_inventory->save();
        return $product_inventory;
    }
}
?>