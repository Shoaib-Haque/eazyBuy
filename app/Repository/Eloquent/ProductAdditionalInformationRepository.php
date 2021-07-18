<?php  
namespace App\Repository\Eloquent;

use App\Models\ProductAdditionalInformation;
use App\Repository\Interfaces\IProductAdditionalInformationRepository;

class ProductAdditionalInformationRepository implements IProductAdditionalInformationRepository
{   
    protected $product_additional_information = null;

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $product_additional_information = new ProductAdditionalInformation;
            $product_additional_information->product_id = $collection['product_id'];
            $product_additional_information->tag = $collection['tag'];
            $product_additional_information->information = $collection['information'];
            $product_additional_information->save();
            return $product_additional_information;
        }
        $product_additional_information = ProductAdditionalInformation::find($id);
        $product_additional_information->product_id = $collection['product_id'];
        $product_additional_information->tag = $collection['tag'];
        $product_additional_information->information = $collection['information'];
        $product_additional_information->save();
        return $product_additional_information;
    }
}
?>