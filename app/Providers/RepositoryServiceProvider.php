<?php

namespace App\Providers;

use App\Repository\Interfaces\IAdminRepository;
use App\Repository\Eloquent\AdminRepository;
use App\Repository\Interfaces\ICustomerRepository;
use App\Repository\Eloquent\CustomerRepository;

use App\Repository\Interfaces\IDepartmentRepository;
use App\Repository\Eloquent\DepartmentRepository;
use App\Repository\Interfaces\ICategoryRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Interfaces\ISubCategoryRepository;
use App\Repository\Eloquent\SubCategoryRepository;
use App\Repository\Interfaces\IBrandRepository;
use App\Repository\Eloquent\BrandRepository;

use App\Repository\Interfaces\IProductRepository;
use App\Repository\Eloquent\ProductRepository;
use App\Repository\Interfaces\IProductDetailRepository;
use App\Repository\Eloquent\ProductDetailsRepository; 
use App\Repository\Interfaces\IProductAdditionalInformationRepository;
use App\Repository\Eloquent\ProductAdditionalInformationRepository;
use App\Repository\Interfaces\IProductDimensionRepository;
use App\Repository\Eloquent\ProductDimensionRepository;
use App\Repository\Interfaces\IProductDiscountRepository;
use App\Repository\Eloquent\ProductDiscountRepository;
use App\Repository\Interfaces\IProductFeatureRepository;
use App\Repository\Eloquent\ProductFeatureRepository;
use App\Repository\Interfaces\IProductImageRepository;
use App\Repository\Eloquent\ProductImageRepository;
use App\Repository\Interfaces\IProductInventoryRepository;
use App\Repository\Eloquent\ProductInventoryRepository;
use App\Repository\Interfaces\IProductLinkRepository;
use App\Repository\Eloquent\ProductLinkRepository;
use App\Repository\Interfaces\IProductSeoRepository;
use App\Repository\Eloquent\ProductSeoRepository;
use App\Repository\Interfaces\IProductWeightRepository;
use App\Repository\Eloquent\ProductWeightRepository;

use App\Repository\Interfaces\IOptionTypeRepository;
use App\Repository\Eloquent\OptionTypeRepository;
use App\Repository\Interfaces\IOptionRepository;
use App\Repository\Eloquent\OptionRepository;
use App\Repository\Interfaces\IOptionImageRepository;
use App\Repository\Eloquent\OptionImageRepository;

use App\Repository\Interfaces\ICombinationRepository;
use App\Repository\Eloquent\CombinationRepository;
use App\Repository\Interfaces\ICombinationInventoryRepository;
use App\Repository\Eloquent\CombinationInventoryRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAdminRepository::class, AdminRepository::class);
        $this->app->bind(ICustomerRepository::class, CustomerRepository::class);

        $this->app->bind(IDepartmentRepository::class, DepartmentRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(ISubCategoryRepository::class, SubCategoryRepository::class);
        $this->app->bind(IBrandRepository::class, BrandRepository::class);

        $this->app->bind(IProductRepository::class, ProductRepository::class);
        $this->app->bind(IProductDetailRepository::class, ProductDetailsRepository::class);
        $this->app->bind(IProductAdditionalInformationRepository::class, ProductAdditionalInformationRepository::class);
        $this->app->bind(IProductDimensionRepository::class, ProductDimensionRepository::class);
        $this->app->bind(IProductDiscountRepository::class, ProductDiscountRepository::class);
        $this->app->bind(IProductFeatureRepository::class, ProductFeatureRepository::class);
        $this->app->bind(IProductImageRepository::class, ProductImageRepository::class);
        $this->app->bind(IProductInventoryRepository::class, ProductInventoryRepository::class);
        $this->app->bind(IProductLinkRepository::class, ProductLinkRepository::class);
        $this->app->bind(IProductSeoRepository::class, ProductSeoRepository::class);
        $this->app->bind(IProductWeightRepository::class, ProductWeightRepository::class);

        $this->app->bind(IOptionTypeRepository::class, OptionTypeRepository::class);
        $this->app->bind(IOptionRepository::class, OptionRepository::class);
        $this->app->bind(IOptionImageRepository::class, OptionImageRepository::class);

        $this->app->bind(ICombinationRepository::class, CombinationRepository::class);
        $this->app->bind(ICombinationInventoryRepository::class, CombinationInventoryRepository::class);
    }
}
