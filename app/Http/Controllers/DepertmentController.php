<?php

namespace App\Http\Controllers;

use App\Models\Depertment;
use App\Http\Requests\StoreDepertmentRequest;
use App\Http\Requests\UpdateDepertmentRequest;

class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.product.depertment.index');
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
     * @param  \App\Http\Requests\StoreDepertmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepertmentRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function show(Depertment $depertment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function edit(Depertment $depertment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepertmentRequest  $request
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepertmentRequest $request, Depertment $depertment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depertment $depertment)
    {
        //
    }
}
