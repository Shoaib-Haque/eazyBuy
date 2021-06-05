<?php  
namespace App\Repository\Eloquent;

use App\Models\Sizes;
use App\Models\SizeTypes;
use App\Repository\Interfaces\ISizeRepository;

class SizeRepository implements ISizeRepository
{   
    protected $size = null;

	public function getAllSizes()
    {
        return Sizes::from('Sizes as s')
                        ->join('SizeTypes as t', 's.size_type_id', '=', 't.id')
                        ->orderBy('s.size', 'ASC')
                        ->select('s.*', 't.type as type')
                        ->get();
    }

    public function getSizeById($id)
    {
        return Sizes::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $size = new Sizes;
            $size->size = $collection['size'];
            $size->size_type_id = $collection['size_type_id'];
            $size->save();
            return $size;
        }
        $size = Sizes::find($id);
        $size->size = $collection['size'];
        $size->size_type_id = $collection['size_type_id'];
        $size->save();
        return $size;
    }

    public function sizeBySizeType($stid)
    {
        return Sizes::from('sizes as s')
                        ->where('s.size_type_id', '=', $stid)
                        ->join('size_types as t', 's.size_type_id', '=', 't.id')
                        ->orderBy('s.size', 'ASC')
                        ->select('s.size as size', 's.id as id')
                        ->get();
    }
}
?>