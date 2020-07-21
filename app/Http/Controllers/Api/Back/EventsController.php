<?php

namespace App\Http\Controllers\Api\Back;

use App\Event;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = ['data'=>Event::all()];
        return response()->json($all);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->get('title');
        $description = $request->get('description');
        $venue = $request->get('location');
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');
        $startTime = $request->get('startTime');
        $endTime = $request->get('endTime');
        $category_id = $request->get('category_id');
        $sub_category_id = $request->get('subCategory_id');

            $newEvent = Event::create([
                'title'=>$title,
                'category_id'=>$category_id,
                'subCategory_id'=>$sub_category_id,
                'code'=>'1111',
                'venue'=>$venue,
                'desc'=>$description,
                'cost'=>1000,
                'startDate'=>$startDate,
                'endDate'=>$endDate,
                'startTime'=>$startTime,
                'endTime'=>$endTime,
                'status'=>'active'
            ]);
            return response()->json(json_encode($newEvent));

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
