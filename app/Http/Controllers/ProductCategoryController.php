<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Interface\CodeGenerationServiceInterface;
use App\Models\ProductDepertment;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategorys = ProductCategory::all()->sortDesc();
        $productDepertments = ProductDepertment::all()->sortDesc();
        return view('dashboard.product.category.index', compact('productCategorys', 'productDepertments'));
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
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request, CodeGenerationServiceInterface $codeGenerationService)
    {
        $formData = $request->validated();

        $objectName = new ProductCategory();

        $formData['code'] =  $codeGenerationService->generate($objectName);
        $formData['date'] = date('Y-m-d', strtotime($formData['date']));

        ProductCategory::create($formData);

        return redirect()->route('product.category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        $productDepertments = ProductDepertment::all()->sortDesc();
        return view('dashboard.product.category.edit', compact('productCategory', 'productDepertments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $formData = $request->validated();
        $productCategory->update($formData);
        return redirect(route('product.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return back();
    }
}
