<?php  
namespace App\Repository\Interfaces;

interface IAdminRepository 
{
    //public function getAllUsers();

    //public function getUserById($id);

    public function getAdminByEmailPassword($email, $password);

    //public function createOrUpdate( $id = null, $collection = [] );

    //public function deleteUser($id);
}
?>