<?php  
namespace App\Repository\Eloquent;

use App\Models\Options;
use App\Repository\Interfaces\IOptionRepository;

class OptionRepository implements IOptionRepository
{   
    protected $option = null;

    public function createOrUpdate( $id = null, $collection = [] )
    {   
        if(is_null($id)) {
            $option = new Options;
            $option->option_type_id = $collection['option_type_id'];
            $option->option = $collection['option'];
            $option->is_default = $collection['is_default'];
            $option->status = $collection['status'];
            $option->save();
            return $option;
        }
        $option = Options::find($id);
        $option->option_type_id = $collection['option_type_id'];
        $option->option = $collection['option'];
        $option->is_default = $collection['is_default'];
        $option->status = $collection['status'];
        $option->save();
        return $option;
    }
}
?>