<?php

namespace App\Repository\Eloquent;

use App\Model\Admin;
use App\Repository\AdminRepositoryInterface;
use Illuminate\Support\Collection;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(User $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }
}
?>