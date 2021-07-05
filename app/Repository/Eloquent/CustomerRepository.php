<?php  
namespace App\Repository\Eloquent;

use App\Models\CustomerProfiles;
use App\Repository\Interfaces\ICustomerRepository;
use Illuminate\Support\Facades\Hash;

class CustomerRepository implements ICustomerRepository
{   
    protected $admin = null;

    public function getCustomerByEmailPassword($email, $password)
    {
        $customer = CustomerProfiles::where('email', '=', $email)->first();
        if (count($customer)) {
            if( Hash::check($password, $customer->password) ){
                return $customer;
            } else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function create($collection = [] )
    {   
        $customer = new CustomerProfiles;
        $customer->id = $collection['id'];
        $customer->name = $collection['name'];
        $customer->email = $collection['email'];
        $customer->password = Hash::make($collection['password']);
        $customer->save();

        return $customer;
    }

    public function checkDuplicate( $email ) {
        $customer = CustomerProfiles::where('email', '=', $email)->first();
        if( count($customer) ){
            return $customer;
        } else {
            return false;
        }
    }

    /* 
	public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $user = new User;
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            $user->password = Hash::make('password');
            return $user->save();
        }
        $user = User::find($id);
        $user->name = $collection['name'];
        $user->email = $collection['email'];
        return $user->save();
    }
    
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
    */ 
}
?>