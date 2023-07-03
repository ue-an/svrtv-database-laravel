<?php

namespace App\Http\Controllers;

use App\Models\FeastmercyministryRecord;
use Illuminate\Http\Request;

class FeastmercyministryRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mainQuery=StockTransactionLog::with(['supplier','customer','warehouse','stockInDetails'=>function($query) use ($productId){
        //     $query->with(['product'])->where('product_stock_in_details.product_id',$productId);
        // },'stockOutDetails'=>function($query) use ($productId){
        //     $query->with(['product'])->where('product_stock_out_details.product_id',$productId);
        // },'stockDamage'=>function($query) use ($productId){
        //     $query->with(['product'])->where('product_damage_details.product_id',$productId);
        // },'stockReturn'=>function($query) use ($productId){
        //     $query->select('id','return_id','product_id');
        //     $query->with(['product'])->where('product_return_details.product_id',$productId);
        // }]);
        $fmm_records = FeastmercyministryRecord::all();
        // $total_months = FeastmercyministryRecord::query('')
        // $donation = FeastmercyministryRecord::reduce(function ($donation, $months) {
        //     return $donation + ($donation->monthly_donation*$months->)
        // })
        return view('feastmercyministry_records.index', compact('fmm_records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feastmercyministry_records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
