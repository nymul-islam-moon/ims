<?php

namespace App\Http\Controllers;

use App\Models\ProductDepertment;
use App\Http\Requests\StoreProductDepertmentRequest;
use App\Http\Requests\UpdateProductDepertmentRequest;
use App\Interface\CodeGenerationServiceInterface;

class ProductDepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productDepertments = ProductDepertment::all()->sortDesc();

        return view('dashboard.product.depertment.index', compact('productDepertments'));
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
     * @param  \App\Http\Requests\StoreProductDepertmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductDepertmentRequest $request, CodeGenerationServiceInterface $codeGenerationService)
    {
        $formData = $request->validated();


        $objectName = new ProductDepertment();

        $formData['code'] =  $codeGenerationService->generate($objectName);
        $formData['date'] = date('Y-m-d', strtotime($formData['date']));

        $depertment = ProductDepertment::create($formData);

        return redirect()->route('product.depertment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductDepertment  $productDepertment
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDepertment $productDepertment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductDepertment  $productDepertment
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDepertment $productDepertment)
    {
        return view('dashboard.product.depertment.edit', compact('productDepertment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductDepertmentRequest  $request
     * @param  \App\Models\ProductDepertment  $productDepertment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductDepertmentRequest $request, ProductDepertment $productDepertment)
    {
        $formData = $request->validated();

        $formData['date'] = date('Y-m-d', strtotime($formData['date']));

        $productDepertment->update($formData);

        return redirect()->route('product.depertment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductDepertment  $productDepertment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDepertment $productDepertment)
    {
        $productDepertment->delete();
        return back();
    }
}
