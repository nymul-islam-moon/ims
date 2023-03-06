<?php

namespace App\Http\Controllers;

use App\Models\ProductTitle;
use App\Http\Requests\StoreProductTitleRequest;
use App\Http\Requests\UpdateProductTitleRequest;
use App\Models\ProductSubCategory;

class ProductTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSubCategories = ProductSubCategory::all()->sortDesc();
        $productTitles = ProductTitle::all()->sortDesc();
        return view('dashboard.product.title.index', compact('productSubCategories', 'productTitles'));
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
     * @param  \App\Http\Requests\StoreProductTitleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTitleRequest $request)
    {
        $formData = $request->validated();

        // code generation start

        $code_name = '';

        $objectName = new ProductTitle();

        if (ProductTitle::where('id', 1)->first()) {
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

        $ProductTitle = ProductTitle::create($formData);
        return redirect()->route('product.title.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTitle  $productTitle
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTitle $productTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTitle  $productTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTitle $productTitle)
    {
        $productSubCategories = ProductSubCategory::all()->sortDesc();
        $productTitles = ProductTitle::all()->sortDesc();
        return view('dashboard.product.title.edit', compact('productTitle', 'productSubCategories', 'productTitles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductTitleRequest  $request
     * @param  \App\Models\ProductTitle  $productTitle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductTitleRequest $request, ProductTitle $productTitle)
    {
        $formData = $request->validated();
        $productTitle->update($formData);

        return redirect()->route('product.title.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTitle  $productTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTitle $productTitle)
    {
        $productTitle->delete();

        return redirect()->route('product.title.index');
    }
}
