<?php

namespace App\Http\Controllers\Api\Back;

use App\EventSubcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventSubcategoryController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = EventSubcategory::create([
                'name'=>$request->input('name'),
                'category_id'=>$request->input('category_id')
            ]);
            return response()->json($data);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),500);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventSubcategory  $eventSubcategory
     * @return \Illuminate\Http\Response
     */
    public function show(EventSubcategory $eventSubcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventSubcategory  $eventSubcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventSubcategory $eventSubcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventSubcategory  $eventSubcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventSubcategory $eventSubcategory)
    {
        //
    }
}
