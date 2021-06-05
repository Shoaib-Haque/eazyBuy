<?php  
namespace App\Repository\Interfaces;

interface ISizeTypeRepository 
{
    public function getAllSizeTypes();

    public function getSizeTypeById($id);

    //public function create( $collection = [] );

    public function createOrUpdate( $id = null, $collection = [] );

    //public function deleteUser($id);
    public function checkDuplicate( $type );
}
?>