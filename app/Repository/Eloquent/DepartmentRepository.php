<?php  
namespace App\Repository\Eloquent;

use App\Models\Departments;
use App\Repository\Interfaces\IDepartmentRepository;

class DepartmentRepository implements IDepartmentRepository
{   
    protected $department = null;

	public function getAllDepartments()
    {
        return Departments::all();
    }

    public function getDepartmentById($id)
    {
        return Departments::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $department = new Departments;
            $department->title = $collection['title'];
            $department->save();
            return $department;
        }
        $department = Departments::find($id);
        $department->title = $collection['title'];
        $department->save();
        return $department;
    }
}
?>