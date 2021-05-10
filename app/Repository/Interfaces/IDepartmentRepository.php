<?php  
namespace App\Repository\Interfaces;

interface IDepartmentRepository 
{
    public function getAllDepartments();

    public function getDepartmentById($id);

    //public function create( $collection = [] );

    public function createOrUpdate( $id = null, $collection = [] );

    //public function deleteUser($id);
}
?>