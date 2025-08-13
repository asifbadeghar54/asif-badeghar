<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\CompaniesModel;
use App\Models\ProductModel;

class Home extends BaseController
{

    public function index()
    {
        $data['title'] = "";
        return $this->renderSinglePage('coming_soon', $data);
    }
}
