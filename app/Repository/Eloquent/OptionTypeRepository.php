<?php  
namespace App\Repository\Eloquent;

use App\Models\OptionTypes;
use App\Repository\Interfaces\IOptionTypeRepository;

class OptionTypeRepository implements IOptionTypeRepository
{   
    protected $optiontype = null;

    public function createOrUpdate( $collection = [], $id = null )
    {   
        if(is_null($id)) {
            $optiontype = new OptionTypes;
            $optiontype->product_id = $collection['product_id'];
            $optiontype->type = $collection['type'];
            $optiontype->input_type = $collection['input_type'];
            $optiontype->status = $collection['status'];
            $optiontype->save();
            return $optiontype;
        }
        $optiontype = OptionTypes::find($id);
        $optiontype->product_id = $collection['product_id'];
        $optiontype->type = $collection['type'];
        $optiontype->input_type = $collection['input_type'];
        $optiontype->status = $collection['status'];
        $optiontype->save();
        return $optiontype;
    }

    public function getOptionTypeByProductId($proId) {
        $data = OptionTypes::where('product_id', '=', $proId)->get();        
        return $data;
    }
}
?>