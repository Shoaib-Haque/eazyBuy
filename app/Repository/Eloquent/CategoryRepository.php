<?php  
namespace App\Repository\Eloquent;

use App\Models\Categories;
use App\Models\Departments;
use App\Repository\Interfaces\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{   
    protected $category = null;

	public function getAllCategories()
    {
        return Categories::from('Categories as c')
                        ->join('Departments as d', 'c.department_id', '=', 'd.id')
                        ->orderBy('d.title', 'ASC')
                        ->orderBy('c.title', 'ASC')
                        ->select('c.*', 'd.title as dtitle')
                        ->get();
    }

    public function getCategoryById($id)
    {
        return Categories::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $category = new Categories;
            $category->title = $collection['title'];
            $category->department_id = $collection['department_id'];
            $category->save();
            return $category;
        }
        $category = Categories::find($id);
        $category->title = $collection['title'];
        $category->department_id = $collection['department_id'];
        $category->save();
        return $category;
    }

    public function categoryByDepartment($did)
    {
        return Categories::from('Categories as c')
                        ->where('c.department_id', '=', $did)
                        ->join('Departments as d', 'c.department_id', '=', 'd.id')
                        ->orderBy('c.title', 'ASC')
                        ->select('c.title as title', 'c.id as id')
                        ->get();
    }

    public function checkDuplicate( $name, $did ) {
        $category = Categories::where('title', '=', $name, 'and')->where('department_id', '=', $did)->first();
        if( count($category) ){
            return $category;
        } else {
            return false;
        }
    }
}
?>