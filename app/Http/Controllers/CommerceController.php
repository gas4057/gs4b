<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Services\CommerceService;

class CommerceController extends Controller
{
    public function getCategories(CommerceService $service)
    {
        return $service->getCategories();
    }

    public function getProducts(CommerceService $service, ProductRequest $request)
    {
        return $service->getProductsWithFilter($request);
    }
}
