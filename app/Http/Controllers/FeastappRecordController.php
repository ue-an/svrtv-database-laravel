<?php

namespace App\Http\Controllers;

use App\Imports\FeastappRecordImport;
use App\Models\FeastappRecord;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FeastappRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $feastapp_records = FeastappRecord::join('attendees', 'feastapp_records.user_id', '=', 'attendees.user_id')->get();
        $feastapp_records = FeastappRecord::all();
        return view('feastapp_records.index', compact('feastapp_records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feastapp_records.create');
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

    public function upload(Request $request) {
        request()->validate([
            'file' => 'required|mimes:xlx,xls,xlsx|max:2048'
        ]);
        // Excel::import(new FeastappRecordImport, $request->file('users'));
        Excel::import(new FeastappRecordImport, $request->file('file')->store('feastapp'));
        return back()->with('massage', 'User Imported Successfully');
    }
}
