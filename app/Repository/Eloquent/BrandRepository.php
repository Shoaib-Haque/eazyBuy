<?php  
namespace App\Repository\Eloquent;

use App\Models\Brands;
use App\Repository\Interfaces\IBrandRepository;

class BrandRepository implements IBrandRepository
{   
    protected $brand = null;

	public function getAllBrands()
    {
        return Brands::all();
    }

    public function getBrandById($id)
    {
        return Brands::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $brand = new Brands;
            $brand->name = $collection['name'];
            $brand->save();
            return $brand;
        }
        $brand = Brands::find($id);
        $brand->name = $collection['name'];
        $brand->save();
        return $brand;
    }

    public function searchBrand($term) {
        $data = Brands::where('name','LIKE','%'.$term.'%')
                        ->take(5)
                        ->get();
        
        return $data;
    }

    public function checkDuplicate( $name ) {
        $brand = Brands::where('name', '=', $name)->first();
        if( count($brand) ){
            return $brand;
        } else {
            return false;
        }
    }
}
?>