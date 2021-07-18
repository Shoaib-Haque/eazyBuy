<?php  
namespace App\Repository\Eloquent;

use App\Models\SubCategories;
use App\Models\Categories;
use App\Repository\Interfaces\ISubCategoryRepository;

class SubCategoryRepository implements ISubCategoryRepository
{   
    protected $subCategory = null;

	public function getAllSubCategories()
    {
        return SubCategories::from('Sub_Categories as s')
                        ->join('Categories as c', 's.category_id', '=', 'c.id')
                        ->join('Departments as d', 'c.department_id', '=', 'd.id')
                        ->orderBy('d.title', 'ASC')
                        ->orderBy('c.title', 'ASC')
                        ->orderBy('s.title', 'ASC')
                        ->select('s.*', 'd.title as dtitle', 'c.title as ctitle')
                        ->get();
    }

    public function getSubCategoryById($id)
    {
        return SubCategories::from('Sub_Categories as s')
                        ->join('Categories as c', 's.category_id', '=', 'c.id')
                        ->join('Departments as d', 'c.department_id', '=', 'd.id')
                        ->where('s.id', '=' , $id)
                        ->select('s.*', 'd.title as dtitle', 'd.id as did', 'c.title as ctitle', 'c.id as cid')
                        ->first();
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $subcategory = new SubCategories;
            $subcategory->title = $collection['title'];
            $subcategory->category_id = $collection['category_id'];
            $subcategory->save();
            return $subcategory;
        }
        $subcategory = SubCategories::find($id);
        $subcategory->title = $collection['title'];
        $subcategory->category_id = $collection['category_id'];
        $subcategory->save();
        return $subcategory;
    }

    public function subCategoryByCategory($cid)
    {
        return SubCategories::from('Sub_Categories as s')
                        ->where('s.category_id', '=', $cid)
                        ->join('Categories as c', 's.category_id', '=', 'c.id')
                        ->orderBy('s.title', 'ASC')
                        ->select('s.title as title', 's.id as id')
                        ->get();
    }

    public function checkDuplicate( $name, $cid ) {
        $subcategory = SubCategories::where('title', '=', $name, 'and')->where('category_id', '=', $cid)->first();
        if( count($subcategory) ){
            return $subcategory;
        } else {
            return false;
        }
    }
}
?>