<?php  
namespace App\Repository\Interfaces;

interface IOptionTypeRepository 
{
    //public function getAllSubCategories();

    //public function getSubCategoryById($id);

    public function createOrUpdate( $id = null, $collection = [] );

    //public function subCategoryByCategory($cid);

    //public function checkDuplicate( $name, $did );
}
?>