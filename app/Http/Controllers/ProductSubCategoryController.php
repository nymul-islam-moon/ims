<?php

namespace App\Http\Controllers;

use App\Models\ProductSubCategory;
use App\Http\Requests\StoreProductSubCategoryRequest;
use App\Http\Requests\UpdateProductSubCategoryRequest;
use App\Models\ProductCategory;

class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategorys = ProductCategory::all()->sortDesc();
        $productSubCategories = ProductSubCategory::all()->sortDesc();
        return view('dashboard.product.sub_category.index', compact('productCategorys', 'productSubCategories'));
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
     * @param  \App\Http\Requests\StoreProductSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSubCategoryRequest $request)
    {
        $formData = $request->validated();

        // code generation start

        $code_name = '';

        $objectName = new ProductSubCategory();

        if (ProductSubCategory::where('id', 1)->first()) {
            $latest_id = $objectName->latest()->first()->id;
            $latest_id = $latest_id + 1;
        } else {
            $latest_id = 1;
        }

        $table_name = $objectName->getTable();
        $name = explode('_', $table_name);

        if(count($name) > 1){

            foreach($name as $key=> $value){
                $code_name.= substr($value, 0, 3) . '-';

            }
            $code_name.= $latest_id;

        }else{
            $code_name = substr($name[0], 0, 3) . '-' . $latest_id;
        }

        $formData['code'] = strtoupper($code_name);

        // Code generation End

        $productSubCategory = ProductSubCategory::create($formData);
        return redirect()->route('product.subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSubCategory $productSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSubCategory $productSubCategory)
    {
        $productCategorys = ProductCategory::all()->sortDesc();
        return view('dashboard.product.sub_category.edit', compact('productSubCategory', 'productCategorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductSubCategoryRequest  $request
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductSubCategoryRequest $request, ProductSubCategory $productSubCategory)
    {
        $formData = $request->validated();
        $productSubCategory->update($formData);
        return redirect(route('product.subcategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSubCategory $productSubCategory)
    {
        $productSubCategory->delete();
        return redirect(route('product.subcategory.index'));
    }
}
