<?php

namespace App\Http\Controllers;

use App\Models\Product_Image;
use App\Http\Requests\StoreProduct_ImageRequest;
use App\Http\Requests\UpdateProduct_ImageRequest;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProduct_ImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct_ImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_Image  $product_Image
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Image $product_Image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_Image  $product_Image
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_Image $product_Image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduct_ImageRequest  $request
     * @param  \App\Models\Product_Image  $product_Image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct_ImageRequest $request, Product_Image $product_Image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_Image  $product_Image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_Image $product_Image)
    {
        //
    }
}
