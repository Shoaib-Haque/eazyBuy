<?php  
namespace App\Repository\Interfaces;

interface IBrandRepository 
{
    public function getAllBrands();

    public function getBrandById($id);

    //public function create( $collection = [] );

    public function createOrUpdate( $id = null, $collection = [] );

    //public function deleteUser($id);
}
?>