<?php  
namespace App\Repository\Eloquent;

use App\Models\SizeTypes;
use App\Repository\Interfaces\ISizeTypeRepository;

class SizeTypeRepository implements ISizeTypeRepository
{   
    protected $sType = null;

	public function getAllSizeTypes()
    {
        return SizeTypes::all();
    }

    public function getSizeTypeById($id)
    {
        return SizeTypes::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $sizeType = new SizeTypes;
            $sizeType->title = $collection['type'];
            $sizeType->save();
            return $sizeType;
        }
        $sizeType = SizeTypes::find($id);
        $sizeType->title = $collection['type'];
        $sizeType->save();
        return $sizeType;
    }

    public function checkDuplicate( $type ) {
        $sizeType = SizeTypes::where('type', '=', $type)->first();
        if( count($sizeType) ){
            return $sizeType;
        } else {
            return false;
        }
    }
}
?>