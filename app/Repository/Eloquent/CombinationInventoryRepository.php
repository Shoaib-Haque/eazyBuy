<?php  
namespace App\Repository\Eloquent;

use App\Models\CombinationInventory;
use App\Repository\Interfaces\ICombinationInventoryRepository;

class CombinationInventoryRepository implements ICombinationInventoryRepository
{   
    protected $combination_inventory = null;

    public function createOrUpdate( $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $combination_inventory = new CombinationInventory;
            $combination_inventory->combination_id = $collection['combination_id'];
            $combination_inventory->sku = $collection['sku'];
            $combination_inventory->stock_quantity = $collection['stock_quantity'];
            $combination_inventory->unit_buying_price = $collection['unit_buying_price'];
            $combination_inventory->unit_selling_price = $collection['unit_selling_price'];
            $combination_inventory->save();
            return $combination_inventory;
        }
        $combination_inventory = CombinationInventory::find($id);
        $combination_inventory->combination_id = $collection['combination_id'];
        $combination_inventory->sku = $collection['sku'];
        $combination_inventory->stock_quantity = $collection['stock_quantity'];
        $combination_inventory->buying_operator = $collection['buying_operator'];
        $combination_inventory->buying_amount = $collection['buying_amount'];
        $combination_inventory->unit_buying_price = $collection['unit_buying_price'];
        $combination_inventory->unit_selling_price = $collection['unit_selling_price'];
        $combination_inventory->save();
        return $combination_inventory;
    }

    public function getCombinationInv($combinationId) {
        $data = CombinationInventory::where("combination_id" , "=" , $combinationId)->first();

        return $data;
    }
}
?>