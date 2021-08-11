<?php

namespace App\Http\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class CommerceService
{
    public function getCategories()
    {
        return Category::all();
    }

    public function getProductsWithFilter(ProductRequest $request)
    {
        $perPage = $request->get('per_page') ? $request->get('per_page') : Product::PAGINATE_COUNT;

        return Product::query()
            ->when($request->min_price && !is_null($request->min_price), function ($query) use ($request) {
                return $query->where('price', '>=', intval($request->min_price));
            })
            ->when($request->max_price && !is_null($request->max_price), function ($query) use ($request) {
                return $query->where('price', '<=', intval($request->max_price));
            })
            ->when($request->sort_by && !is_null($request->sort_by), function ($query) use ($request) {
                return $query->orderBy('price', $request->sort_by);
            })
            ->when($request->categories && !is_null($request->categories), function ($query) use ($request) {
                return $query->whereIn('category_id', $request->categories);
            })
            ->with('category')
            ->paginate($perPage);
    }
}
