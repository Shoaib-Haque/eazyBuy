<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class CustomerProductController extends Controller
{
    public $product, $productDetails, $productDimension, $productWeight, $productSeo, $productInventory, $productLink,
           $relatedProduct, $productImage, $productFeature, $productAdditionalInformation, $productDiscount, $optionType, 
           $option, $optionImage, $combination, $combinationInventory;

   	public function __construct(IProductRepository $product, 
                                IProductDetailRepository $productDetails, IProductDimensionRepository $productDimension,
                                IProductWeightRepository $productWeight, IProductSeoRepository $productSeo, 
                                IProductInventoryRepository $productInventory, 
                                IProductLinkRepository $productLink, IRelatedProductRepository $relatedproduct,
                                IProductImageRepository $productImage, IProductFeatureRepository $productFeature,
                                IProductAdditionalInformationRepository $productAdditionalInformation,
                                IProductDiscountRepository $productDiscount, IOptionTypeRepository $optionType, 
                                IOptionRepository $option, IOptionImageRepository $optionImage, 
                                ICombinationRepository $combination, ICombinationInventoryRepository $combinationInventory) {
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

    public function index($proId) {
        $productImg = $this->productImage->getProductImageById($proId);
        $productImg = $this->productImage->getProductImageById($proId);
        $productInfo = $this->product->getProductById($proId);
        $optionTypes = $this->optionType->getOptionTypeByProductId($proId);
        $options = array();
        $optionImages = array();
        foreach ($optionTypes as $typeKey => $typeValue) {
            $opt = $options[] = $this->option->getOptionByTypeId($typeValue['id']);
            foreach ($opt as $optKey => $optValue) {
                if ($this->optionImage->getOptionImageByOptionId($optValue['id'])) {
                    $optionImages[] = $this->optionImage->getOptionImageByOptionId($optValue['id']);
                }
            }
        }

        return response()->json([
            'productImg' => $productImg, 'productInfo' => $productInfo,  'optionTypes' => $optionTypes, 
            'options' => $options, 'optionImages' => $optionImages
        ]);
        
        /* $productImg = $this->productImage->getProductImageById($proId);
    	$productImg = $this->productImage->getProductImageById($proId);
        $productInfo = $this->product->getProductById($proId);
        $optionTypes = $this->optionType->getOptionTypeByProductId($proId);
        $options = array();
        $optionImages = array();
        foreach ($optionTypes as $typeKey => $typeValue) {
            $opt = $options[] = $this->option->getOptionByTypeId($typeValue['id']);
            foreach ($opt as $optKey => $optValue) {
                if ($this->optionImage->getOptionImageByOptionId($optValue['id'])) {
                    $optionImages[] = $this->optionImage->getOptionImageByOptionId($optValue['id']);
                }
            }
        }

        return view("customer.product.index1", [ 'productImg' => $productImg, 'productInfo' => $productInfo, 
                                                'optionTypes' => $optionTypes, 'options' => $options, 
                                                'optionImages' => $optionImages]);
        */ 
    }

    public function getPrice(Request $req) {
        $combinationId = $this->combination->getCombination($req->proId, $req->combination)['id'];
        $combinationInv = $this->combinationInventory->getCombinationInv($combinationId);
        
        return response()->json($combinationInv);
    }

    public function getImage(Request $req) {
        $comArr = explode("-", $req->combination);
        $optionTypes = $this->optionType->getOptionTypeByProductId($req->proId);
        foreach ($optionTypes as $typeKey => $typeValue) {
            $opt = $this->option->getOptionForImage($typeValue['id'], $comArr);
            $optionImages = $this->optionImage->getOptionImagesByOptionId($opt['id']);
            if (count($optionImages) >= 1) {
                return response()->json($optionImages);
            }
        }
    }

    public function getOptionTypes(Request $req) {
        $optionTypes = $this->optionType->getOptionTypeByProductId($req->proId);

        return response()->json($optionTypes);
    }
}
