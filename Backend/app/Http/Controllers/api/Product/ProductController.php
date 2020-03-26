<?php

namespace App\Http\Controllers\api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Product::all();

        return Cache::remember('users', 3600, function () {
            return Product::all();
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $result = Product::create($request->all());
        if ($result) {
            return response()->json([
                'data' => 'Product Created Successfully!'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'error' => 'Product Not Created !'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $result = $product->update($request->all());
        if ($result) {
            return response()->json([
                'data' => 'Product Updated Successfully!'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'error' => 'Product Not Updated !'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $result = $product->delete();

        if ($result) {
            Cache::put('users', Product::all(), 3600);
            return response()->json([
                'data' => 'Product Deleted Successfully!'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'error' => 'Product Not Deleted !'
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
