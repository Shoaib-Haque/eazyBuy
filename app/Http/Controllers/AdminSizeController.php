<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interfaces\ISizeRepository;
use App\Repository\Interfaces\ISizeTypeRepository;

class AdminSizeController extends Controller
{
    public $sizeType, $size;

	public function __construct(ISizeRepository $size, ISizeTypeRepository $sizeType) {
        $this->size = $size;
        $this->sizeType = $sizeType;
    }

    function sizeBySizeType(Request $req) {
        if($req->size_type_id){
            $result = $this->size->sizeBySizeType($req->size_type_id);
            if(count($result) >=1){
                echo '<div class="remove-option">Select Size(s)</div>';
                echo '<div><input id="selectAllSizesId" type="checkbox" onclick="selectAllSizes(this);">
                <label id="selectAllLabel">Select All</label></div>';
                echo '<div id="sizes">';
                foreach($result as $key => $value){ 
                    echo '<input type="checkbox" name="size" id="size'.$value->id.'" value="'.$value->id.'">
                            <label id="label.'.$value->id.'">'.$value->size.'</label>&nbsp;&nbsp;&nbsp;';
                }
                echo '</div>';
            }
            else {
                echo '<div>No Size Available</div>';
            }
        }
    }
}
