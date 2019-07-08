<?php

namespace App\Http\Controllers;

use App\CT\Repositories\ProductRepository;
use App\Http\Requests\Product\AddProduct;
use App\Http\Requests\Product\UpdateProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param ProductRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ProductRepository $repository)
    {
        return response()->json($repository->all());
    }

    /**
     * @param ProductRepository $repository
     * @param AddProduct $addProduct
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRepository $repository, AddProduct $addProduct)
    {
        $product = $repository->store($addProduct->only(['name', 'quantity', 'price']));

        return response()->json([
            'product' => $product,
            'message' => 'Created'
        ], 201);
    }

    /**
     * @param ProductRepository $repository
     * @param UpdateProduct $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductRepository $repository, UpdateProduct $request, $id)
    {
        $repository->update($id, $request->only(['name', 'quantity', 'price']));

        return response()->json([
            'message' => 'Updated'
        ]);
    }

    /**
     * @param ProductRepository $repository
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ProductRepository $repository, $id)
    {
        $repository->delete($id);

        return response()->json([
            'message' => 'Deleted'
        ]);

    }
}
