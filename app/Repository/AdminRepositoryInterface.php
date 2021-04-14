<?php
namespace App\Repository;

use App\Model\Admin;
use Illuminate\Support\Collection;

	interface AdminRepositoryInterface
	{
	   public function all(): Collection;
	}
?>