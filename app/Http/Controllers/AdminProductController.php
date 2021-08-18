<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\Interfaces\IDepartmentRepository;
use App\Repository\Interfaces\IProductRepository;
use App\Repository\Interfaces\IProductDetailRepository;
use App\Repository\Interfaces\IProductDimensionRepository;
use App\Repository\Interfaces\IProductWeightRepository;
use App\Repository\Interfaces\IProductSeoRepository;
use App\Repository\Interfaces\IProductInventoryRepository;
use App\Repository\Interfaces\IProductLinkRepository;
use App\Repository\Interfaces\IRelatedProductRepository;
use App\Repository\Interfaces\IProductImageRepository;
use App\Repository\Interfaces\IProductFeatureRepository;
use App\Repository\Interfaces\IProductAdditionalInformationRepository;
use App\Repository\Interfaces\IProductDiscountRepository;

use App\Repository\Interfaces\IOptionTypeRepository;
use App\Repository\Interfaces\IOptionRepository;
use App\Repository\Interfaces\IOptionImageRepository;

use App\Repository\Interfaces\ICombinationRepository;
use App\Repository\Interfaces\ICombinationInventoryRepository;

class AdminProductController extends Controller
{
    public $department, $product, $productDetails, $productDimension, $productWeight, $productSeo, $productInventory, $productLink,
           $relatedProduct, $productImage, $productFeature, $productAdditionalInformation, $productDiscount, $optionType, 
           $option, $optionImage, $combination, $combinationInventory;

    public function __construct(IDepartmentRepository $department, IProductRepository $product, 
                                IProductDetailRepository $productDetails, IProductDimensionRepository $productDimension,
                                IProductWeightRepository $productWeight, IProductSeoRepository $productSeo, 
                                IProductInventoryRepository $productInventory, 
                                IProductLinkRepository $productLink, IRelatedProductRepository $relatedproduct,
                                IProductImageRepository $productImage, IProductFeatureRepository $productFeature,
                                IProductAdditionalInformationRepository $productAdditionalInformation,
                                IProductDiscountRepository $productDiscount, IOptionTypeRepository $optionType, 
                                IOptionRepository $option, IOptionImageRepository $optionImage, 
                                ICombinationRepository $combination, ICombinationInventoryRepository $combinationInventory) {
        $this->department = $department;
        $this->product = $product;
        $this->productDetails = $productDetails;
        $this->productDimension = $productDimension;
        $this->productWeight = $productWeight;
        $this->productSeo = $productSeo;
        $this->productInventory = $productInventory;
        $this->productLink = $productLink;
        $this->relatedproduct = $relatedproduct;
        $this->productImage = $productImage;
        $this->productFeature = $productFeature;
        $this->productAdditionalInformation = $productAdditionalInformation;
        $this->productDiscount = $productDiscount;

        $this->optionType = $optionType;
        $this->option = $option;
        $this->optionImage = $optionImage;

        $this->combination = $combination;
        $this->combinationInventory = $combinationInventory;
    }
    
    function index() {
    	return view('admin.catalog.product.index');
    }

    function add() {
        $departmentlist = $this->department->getAllDepartments();
    	return view('admin.catalog.product.add', ['departmentlist' => $departmentlist]);
    }


    function addProduct(Request $req) {
        $destinationPath = 'images/product';
        //General
        $description = trim($req->description);
        $description = stripslashes($description);
        $description = htmlspecialchars($description);

        $proId = $this->product->createOrUpdate(null, array('name' => $req->product_name, 'description' => $description, 
                                                                'status' => 'Enabled'))['id'];
        
        //Details
        $proDetails = $this->productDetails->createOrUpdate(null, array('product_id' => $proId, 'model' => $req->model, 
                    'shipping_required' => $req->shipping_required, 'minimum_order_quantity' => $req->minimum_order_quantity, 
                    'subtract_stock' => $req->subtract_stock, 'number_of_items' => $req->number_of_items, 
                    'tax_class' => $req->tax_class, 'tax_parcentage' => $req->tax_parcentage, 
                    'unit_of_measure' => $req->unit_of_measure, 
                    'created_at' => Carbon::now()->toDateString(), 'updated_at' => Carbon::now()->toDateString()));

        //Dimension
        if (isset($req->length_class) && $req->length_class != NULL) {
            $proDimension = $this->productDimension->createOrUpdate(array('product_id' => $proId, 
            'length_class' => $req->length_class, 'length' => $req->length, 'width' => $req->width, 'height' => $req->height));
        }
        
        //Weight
        if (isset($req->weight_class) && $req->weight_class != NULL) {
            $proWeight = $this->productWeight->createOrUpdate(array('product_id' => $proId, 'weight_class' => $req->weight_class,
                                                                'weight' => $req->weight));
        }
        
        //SEO
        if (isset($req->seo) && $req->seo != NULL) {
            $proSeo = $this->productSeo->createOrUpdate(array('product_id' => $proId, 'seo' => $req->seo));
        }

        //Inventory
        $proInventory = $this->productInventory->createOrUpdate(array('product_id' => $proId, 'sku' => $req->product_sku, 
                        'stock_quantity' => $req->stock_quantity, 
                        'unit_buying_price' => $req->unit_buying_price, 'unit_selling_price' => $req->unit_selling_price));


        //Link
        $proLink = $this->productLink->createOrUpdate(array('product_id' => $proId, 'brand_id' => $req->brand_id, 
                                                            'sub_category_id' => $req->subcategory_id));

        //Related product
        if (isset($req->relatedproduct)) {
            foreach ($req->relatedproduct as $key => $value) {
                $this->relatedproduct->createOrUpdate(array('product_id' => $proId, 'related_product_id' => $value));
            }
        }

        //Image
        if (isset($req->file)) { // Check if there is file
            $fCount = count($req->file);  
            for ($i=0; $i < $fCount; $i++) { 
                $combine = $i;
                if (!isset($req->{"fileStatus".$combine})) {
                    $file = $req->file[$i];
                    //$oldName = $file->getClientOriginalName();
                    //$realPath = $file->getRealPath();
                    //$fileOriginalName = preg_replace('/\..+$/', '', $file->getClientOriginalName());
                    $fileExtension = $file->getClientOriginalExtension();

                    $newName = (string)$proId.(string)$i. '.' .$fileExtension;
                    $file->move($destinationPath, $newName);
                    $proImage = $this->productImage->createOrUpdate(array('product_id' => $proId, 'img_name' => $newName));
                }
            }
        }

        //option
        //single
        $singleGroupCount = $req->hiddenSingleGroupCount;
        for($i=0; $i <= $singleGroupCount; $i++) { //Div loop
            if (isset($req->singleOptionGroup[$i])) { // Is the Div exist?
                $optTypeId = $this->optionType->createOrUpdate(array('product_id' => $proId,'type' => $req->singleOptionGroup[$i],
                                                        'input_type' => $req->singleSelectType[$i], 'status' => 'Enabled'))['id'];

                //$optionRowCount = intval($req->hiddenSingleRowCount[$i]); // Row Count of each option type
                $optionRowCount = count($req->singleOption[$i]);
                for ($j=0; $j < $optionRowCount; $j++) { // Row loop of each Div
                    if (isset($req->singleOption[$i][$j])) { // Is the Row exist?
                        $optArray = array('option_type_id' => $optTypeId, 'option' => $req->singleOption[$i][$j], 
                                        'status' => 'Enabled');
                        if (isset($req->singleDefault[$i][$j])) {
                            $optArray['is_default'] = "Yes";
                        }
                        else {
                            $optArray['is_default'] = "No";
                        }

                        $optId = $this->option->createOrUpdate($optArray)['id'];

                        $comId = $this->combination->createOrUpdate(array('product_id' => $proId, 
                                            'combination' => $req->singleOption[$i][$j], 'status' => 'Enabled'))['id'];

                        if ($req->singleSelectBuyVar[$i][$j] == "+") {
                            $buyingPrice = $req->unit_buying_price + $req->singleBuyingPrice[$i][$j];
                        }
                        else {
                            $buyingPrice = $req->unit_buying_price - $req->singleBuyingPrice[$i][$j];
                        }

                        if ($req->singleSelectSellVar[$i][$j] == "+") {
                            $sellingPrice = $req->unit_selling_price + $req->singleSellingPrice[$i][$j];
                        }
                        else {
                            $sellingPrice = $req->unit_selling_price - $req->singleSellingPrice[$i][$j];
                        }

                        $comInventory = $this->combinationInventory->createOrUpdate(array('combination_id' => $comId, 
                            'sku' => $req->singleSKU[$i][$j], 'stock_quantity' => $req->singleQuantity[$i][$j], 
                            'unit_buying_price' => $buyingPrice, 'unit_selling_price' => $sellingPrice));

                        if (isset($req->singleFile[$i][$j])) { // Check if there is file
                            $fCount = count($req->singleFile[$i][$j]);  
                            for ($k=0; $k < $fCount; $k++) { 
                                $combine = $i.$j.$k;
                                if (!isset($req->{"singleFileStatus".$combine})) {
                                    $file = $req->singleFile[$i][$j][$k];
                                    $fileExtension = $file->getClientOriginalExtension();

                                    $newName = (string)$optId.(string)$k. '.' .$fileExtension;
                                    $file->move($destinationPath, $newName);
                                    $optImage = $this->optionImage->createOrUpdate(array('option_id' => $optId, 
                                                                                          'img_name' => $newName));
                                }
                            }
                        }
                    }
                }
            }
        }

        //nested
        $nestedGroupCount = $req->hiddenNestedGroupCount;
        for($i=1; $i <= $nestedGroupCount; $i++) { //Nested Div loop
            if (isset($req->hiddenOptionGroupNumber[$i])) { // Is the div exist
                //$gorupCount = $req->hiddenOptionGroupNumber[$i];
                $gorupCount = count($req->nestedOptionGroup[$i]);
                for ($j=0; $j < $gorupCount; $j++) { // Group Div loop
                    if (isset($req->nestedOptionGroup[$i][$j])) { // Is the Div exist?
                        $optTypeId = $this->optionType->createOrUpdate(array('product_id' => $proId, 
        'type' => $req->nestedOptionGroup[$i][$j], 'input_type' => $req->nestedSelectType[$i][$j], 'status' => 'Enabled'))['id'];
                        
                        $optionCount = $req->hiddenNestedRowCount[$i][$j];
                        for ($k=0; $k < $optionCount; $k++) { //Row Loop
                            if (isset($req->nestedOption[$i][$j][$k])) { // Is the row exist?
            $optArray = array('option_type_id' => $optTypeId, 'option' => $req->nestedOption[$i][$j][$k], 'status' => 'Enabled');
                                
                                if (isset($req->nestedDefault[$i][$j][$k])) {
                                    $optArray['is_default'] = "Yes";
                                }
                                else {
                                    $optArray['is_default'] = "No";
                                }

                                $optId = $this->option->createOrUpdate($optArray)['id'];

                                if (isset($req->nestedFile[$i][$j][$k])) { // Check if there is file
                                    $fCount = count($req->nestedFile[$i][$j][$k]);  
                                    for ($l=0; $l < $fCount; $l++) { 
                                        $combine = $i.$j.$k.$l;
                                        if (!isset($req->{"nestedFileStatus".$combine})) {
                                            $file = $req->nestedFile[$i][$j][$k][$l];
                                            $fileExtension = $file->getClientOriginalExtension();

                                            $newName = (string)$optId.(string)$l. '.' .$fileExtension;
                                            $file->move($destinationPath, $newName);
                                            $optImage = $this->optionImage->createOrUpdate(array('option_id' => $optId, 
                                                                                                  'img_name' => $newName));
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
                        $comId = $this->combination->createOrUpdate(array('product_id' => $proId, 
                                            'combination' => $req->comboOption[$i][$j], 'status' => 'Enabled'))['id'];

                        if ($req->comboSelectBuy[$i][$j] == "+") {
                            $buyingPrice = $req->unit_buying_price + $req->comboBuyingPrice[$i][$j];
                        }
                        else {
                            $buyingPrice = $req->unit_buying_price - $req->comboBuyingPrice[$i][$j];
                        }

                        if ($req->comboSelectSell[$i][$j] == "+") {
                            $sellingPrice = $req->unit_selling_price + $req->comboSellingPrice[$i][$j];
                        }
                        else {
                            $sellingPrice = $req->unit_selling_price - $req->comboSellingPrice[$i][$j];
                        }

                        $comInventory = $this->combinationInventory->createOrUpdate(array('combination_id' => $comId, 
                            'sku' => $req->comboSKU[$i][$j], 'stock_quantity' => $req->comboQuantity[$i][$j], 
                            'unit_buying_price' => $buyingPrice, 'unit_selling_price' => $sellingPrice));
                    }
                }
            }
        }

        //Feature
        $featureCount = count($req->featureTag);
        for ($i=0; $i < $featureCount; $i++) { 
            $proFeature = $this->productFeature->createOrUpdate(array('product_id' => $proId, 'tag' => $req->featureTag[$i],
                                                                      'feature' => $req->feature[$i]));
        }

        //Additional Information
        $additionalCount = count($req->additionalTag);
        for ($i=0; $i < $additionalCount; $i++) { 
            $proAdditionalInformation = $this->productAdditionalInformation->createOrUpdate(array('product_id' => $proId, 
                                                        'tag' => $req->additionalTag[$i], 'information' => $req->information[$i]));
        }

        //Discount
        $discountCount = count($req->discountMinQuantity);
        for ($i=0; $i < $discountCount; $i++) { 
            $proDiscount = $this->productDiscount->createOrUpdate(array('product_id' => $proId, 
                'discount_parcentage' => $req->discountParcentage[$i], 'minimum_order_quantity' => $req->discountMinQuantity[$i], 
                'start_date' => $req->discountStartDate[$i], 'end_date' => $req->discountEndDate[$i]));
        }
    }

    public function searchRelatedProduct(Request $request) {
        $term = $request->term;

        $queries = $this->product->searchRelatedProduct($term);
        $results = array();

        foreach ($queries as $query) {
            $results[] = ['id' => $query->id, 'value' => $query->name]; //you can take custom values as you want
        }
        return response()->json($results);
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
