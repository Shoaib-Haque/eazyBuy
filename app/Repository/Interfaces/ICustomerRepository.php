<?php  
namespace App\Repository\Interfaces;

interface ICustomerRepository 
{
    //public function getAllUsers();

    //public function getUserById($id);

    public function getCustomerByEmailPassword($email, $password);

    public function create( $collection = [] );

    public function checkDuplicate( $email );

    //public function createOrUpdate( $id = null, $collection = [] );

    //public function deleteUser($id);
}
?>