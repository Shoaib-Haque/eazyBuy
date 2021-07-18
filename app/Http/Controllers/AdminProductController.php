<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\Interfaces\IDepartmentRepository;
use App\Repository\Interfaces\ISizeTypeRepository;

class AdminProductController extends Controller
{
    public $department;

    public function __construct(IDepartmentRepository $department) {
        $this->department = $department;
    }
    
    function index() {
    	return view('admin.catalog.product.index');
    }

    function add() {
        $departmentlist = $this->department->getAllDepartments();
    	return view('admin.catalog.product.add', ['departmentlist' => $departmentlist]);
    }


    function addProduct(Request $req) {
        //option
        //single
        $singleGroupCount = $req->hiddenSingleGroupCount;
        for($i=0; $i <= $singleGroupCount; $i++) { //Div loop
            if (isset($req->singleOptionGroup[$i])) { // Is the Div exist?
                echo $req->singleOptionGroup[$i].", ".$req->singleSelectType[$i]."<br>";

                $optionRowCount = intval($req->hiddenSingleRowCount[$i]); // Row Count of each option type
                for ($j=0; $j < $optionRowCount; $j++) { // Row loop of each Div
                    if (isset($req->singleOption[$i][$j])) { // Is the Row exist?
                        echo $req->singleOption[$i][$j].", ".$req->singleSKU[$i][$j].", ".
                        $req->singleQuantity[$i][$j].", ".$req->singleSelectVar[$i][$j].", ".$req->singlePrice[$i][$j];
                        if (isset($req->singleDefault[$i][$j])) {
                            echo ", Checked";
                        }
                        
                        echo "<br>";

                        if (isset($req->singleFile[$i][$j])) { // Check if there is file
                            $fCount = count($req->singleFile[$i][$j]);  
                            for ($k=0; $k < $fCount; $k++) { 
                                $combine = $i.$j.$k;
                                if (!isset($req->{"singleFileStatus".$combine})) {
                                    echo $req->singleFile[$i][$j][$k]->getClientOriginalName().", ";
                                    echo $req->singleFile[$i][$j][$k]->getRealPath().", ";
                                    echo preg_replace('/\..+$/', '', $req->singleFile[$i][$j][$k]->getClientOriginalName()).", ";
                                    echo $req->singleFile[$i][$j][$k]->getClientOriginalExtension().", ";
                                    echo "<br>";
                                }
                            }
                        }
                    }
                }
                echo "<br>";
            }
        }

        //nested
        $nestedGroupCount = $req->hiddenNestedGroupCount;
        for($i=1; $i <= $nestedGroupCount; $i++) { //Nested Div loop
            if (isset($req->hiddenOptionGroupNumber[$i])) { // Is the div exist
                $gorupCount = $req->hiddenOptionGroupNumber[$i];
                for ($j=0; $j < $gorupCount; $j++) { // Group Div loop
                    if (isset($req->nestedOptionGroup[$i][$j])) { // Is the Div exist?
                        echo $req->nestedOptionGroup[$i][$j].", ".$req->nestedSelectType[$i][$j]."<br>";
                        $optionCount = $req->hiddenNestedRowCount[$i][$j];
                        for ($k=0; $k < $optionCount; $k++) { //Row Loop
                            if (isset($req->nestedOption[$i][$j][$k])) { // Is the row exist?
                                echo $req->nestedOption[$i][$j][$k];
                                if (isset($req->nestedDefault[$i][$j][$k])) {
                                    echo ", Checked";
                                }

                                echo "<br>";

                                if (isset($req->nestedFile[$i][$j][$k])) { // Check if there is file
                                    $fCount = count($req->nestedFile[$i][$j][$k]);  
                                    for ($l=0; $l < $fCount; $l++) { 
                                        $combine = $i.$j.$k.$l;
                                        if (!isset($req->{"nestedFileStatus".$combine})) {
                                            echo $req->nestedFile[$i][$j][$k][$l]->getClientOriginalName().", ";
                                            echo $req->nestedFile[$i][$j][$k][$l]->getRealPath().", ";
                                            echo preg_replace('/\..+$/', '', 
                                                $req->nestedFile[$i][$j][$k][$l]->getClientOriginalName()).", ";
                                            echo $req->nestedFile[$i][$j][$k][$l]->getClientOriginalExtension().", ";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            //Combination
            if (isset($req->comboOption[$i])) {
                $comboRow = count($req->comboOption[$i]);
                for ($j=0; $j < $comboRow; $j++) { 
                    if (isset($req->comboOption[$i][$j])) {
                        echo $req->comboOption[$i][$j].", ".$req->comboSKU[$i][$j].", ".$req->comboQuantity[$i][$j].", ".
                             $req->comboSelect[$i][$j].", ".$req->comboPrice[$i][$j]."<br>";
                    }
                }
            }
            echo("<br>");
        }

        echo "<br>";
        if (isset($req->file)) { // Check if there is file
            $fCount = count($req->file);  
            for ($i=0; $i < $fCount; $i++) { 
                $combine = $i;
                if (!isset($req->{"fileStatus".$combine})) {
                    echo $req->file[$i]->getClientOriginalName().", ";
                    echo $req->file[$i]->getRealPath().", ";
                    echo preg_replace('/\..+$/', '', $req->file[$i]->getClientOriginalName()).", ";
                    echo $req->file[$i]->getClientOriginalExtension().", ";
                    echo "<br>";
                }
            }
        }

        $featureCount = count($req->featureTag);
        for ($i=0; $i < $featureCount; $i++) { 
            echo $req->featureTag[$i].": ".$req->feature[$i]."<br>";
        }

        $additionalCount = count($req->additionalTag);
        for ($i=0; $i < $additionalCount; $i++) { 
            echo $req->additionalTag[$i].": ".$req->information[$i]."<br>";
        }

        $discountCount = count($req->discountMinQuantity);
        for ($i=0; $i < $discountCount; $i++) { 
            echo $req->discountMinQuantity[$i].", ".$req->discountParcentage[$i].", ".
                 $req->discountStartDate[$i].", ".$req->discountEndDate[$i]."<br>";
        }

        /*General
        $description = trim($req->description);
        $description = stripslashes($description);
        $description = htmlspecialchars($description);*/
    }

    /* 
    ck decouple editor text saving indo db
    function addck(Request $req) {
        $des = trim($req->des);
        $des = stripslashes($des);
        $des = htmlspecialchars($des);
        DB::table('ckeditor')->insertGetId(
            ['des' => $des, 'name' => $req->name, 'image' => $req->image]
        );
        return redirect()->route('adminproduct.index');
    }

    ck decouple editor text show from DB
    <table>
        @foreach($productlist as $productlist)
            <tr>
                <td>{!! html_entity_decode($productlist->des, ENT_QUOTES, 'UTF-8') !!} </td>
            </tr>
        @endforeach
    </table>
    */
}
