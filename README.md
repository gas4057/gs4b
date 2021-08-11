#Installs

1. Clone project
2. Set .env
3. composer install
4. php artisan migrate --seed

#Points
- GET /api/products
- ```
    'per_page' => 'sometimes|numeric|min:1',
    'sort_by' => 'sometimes|in:asc,desc',
    'min_price' => 'sometimes|numeric',
    'max_price' => 'sometimes|numeric',
    'categories' => 'sometimes|array',
    'categories.*' => 'exists:categories,id'  
  ```

- GET /api/categories
