<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductInventory;
use App\Repository\Interfaces\IProductInventoryRepository;

class ProductInventoryRepository implements IProductInventoryRepository
{   
    protected $product_inventory = null;

    public function createOrUpdate( $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $product_inventory = new ProductInventory;
            $product_inventory->product_id = $collection['product_id'];
            $product_inventory->SKU = $collection['sku'];
            $product_inventory->stock_quantity = $collection['stock_quantity'];
            $product_inventory->unit_buying_price = $collection['unit_buying_price'];
            $product_inventory->unit_selling_price = $collection['unit_selling_price'];
            $product_inventory->save();
            return $product_inventory;
        }
        $product_inventory = ProductInventory::find($id);
        $product_inventory->product_id = $collection['product_id'];
        $product_inventory->SKU = $collection['sku'];
        $product_inventory->stock_quantity = $collection['stock_quantity'];
        $product_inventory->unit_buying_price = $collection['unit_buying_price'];
        $product_inventory->unit_selling_price = $collection['unit_selling_price'];
        $product_inventory->save();
        return $product_inventory;
    }
}
?>