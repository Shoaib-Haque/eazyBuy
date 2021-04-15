<?php  
namespace App\Repository\Eloquent;

use App\Models\AdminProfiles;
use App\Repository\Interfaces\IAdminRepository;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements IAdminRepository
{   
    protected $admin = null;

    public function getAdminByEmailPassword($email, $password)
    {
        $admin = AdminProfiles::where('email', '=', $email, 'and')->where('password', '=' , $password)->first();
        if( count($admin) ){
            return $admin;
        } else {
            $admin = ["No"];
            return $admin;
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