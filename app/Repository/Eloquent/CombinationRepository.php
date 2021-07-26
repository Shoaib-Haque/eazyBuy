<?php  
namespace App\Repository\Eloquent;

use App\Models\Combinations;
use App\Repository\Interfaces\ICombinationRepository;

class CombinationRepository implements ICombinationRepository
{   
    protected $combination = null;

    public function createOrUpdate( $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $combination = new Combinations;
            $combination->product_id = $collection['product_id'];
            $combination->combination = $collection['combination'];
            $combination->status = $collection['status'];
            $combination->save();
            return $combination;
        }
        $combination = Combinations::find($id);
        $combination->product_id = $collection['product_id'];
        $combination->combination = $collection['combination'];
        $combination->status = $collection['status'];
        $combination->save();
        return $combination;
    }
}
?>