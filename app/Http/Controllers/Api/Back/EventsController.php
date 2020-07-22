<?php

namespace App\Http\Controllers\Api\Back;

use App\Event;
use App\EventImage;
use App\EventsModel\Event as EventsModelEvent;
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
        $events = Event::all();
        $filteredEvents=[];
        foreach ($events as $event) {
            // dump($event->toArray());
            $images =EventImage::where('event_id',$event->id)->first()->get();
            $imageProp = array(['image_url'=>$images[0]->path]);
            $newObj =array_merge($event->toArray(),$imageProp);
            $filteredEvents[] = $newObj;
        }

        // $all = ['data'=>Event::all()];
        return response()->json($filteredEvents);
    }
    public function uploadFiles(Request $request)
    {
        return response()->json($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request);
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
            // return response()->json($newEvent);
            $images =[];

            foreach ($request->file('images') as $key => $value) {
                $fileName = $request->file('images')[$key]->store('public/event_images');
                $eventImage = EventImage::create([
                    'path'=>$fileName,
                    'event_id'=>$newEvent->id,
                ]);
                $images[]=$eventImage;
            }
            return response()->json(json_encode($images));

    }
    private function getImage($id){

        $image =EventImage::find($id)->first();
        $imageProp ='http://'. request()->getHttpHost().'/'. str_replace('public','storage',$image->path);

        return $imageProp;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event,$eventId)
    {
        $eventDetails = Event::find($eventId);
        // return response()->json($eventDetails);
        $image = $this->getImage($eventDetails->id);
        $eventArray =$eventDetails->toArray();
        $mergedArray = array_merge($eventArray,['image_url'=>$image]);

        return response()->json($mergedArray);


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
