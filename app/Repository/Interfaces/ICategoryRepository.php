<?php  
namespace App\Repository\Interfaces;

interface ICategoryRepository 
{
    public function getAllCategories();

    public function getCategoryById($id);

    //public function create( $collection = [] );

    public function createOrUpdate( $id = null, $collection = [] );

    //public function deleteUser($id);
}
?>