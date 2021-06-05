<?php  
namespace App\Repository\Interfaces;

interface ISizeRepository 
{
    public function getAllSizes();

    public function getSizeById($id);

    //public function create( $collection = [] );

    public function createOrUpdate( $id = null, $collection = [] );

    //public function deleteUser($id);
    public function SizeBySizeType($stid);
}
?>