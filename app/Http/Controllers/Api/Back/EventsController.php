<?php

namespace App\Http\Controllers\Api\Back;

use App\CategoryImage;
use App\Event;
use App\EventCategory;
use App\EventImage;
use App\EventsModel\Event as EventsModelEvent;
use App\EventsModel\EventSubCategory as EventsModelEventSubCategory;
use App\EventSubcategory;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class EventsController extends Controller
{
    private function getImage($event_id){

        $image =EventImage::where('event_id',$event_id)->get()->first();
        $imageProp ='http://'. request()->getHttpHost().'/'. str_replace('public','storage',$image->path);
        return $imageProp;
    }
    private function getSubCategoryImage($id)
    {
        try {

        $image =CategoryImage::where('type',false)->where('type_id',$id)->get()->first();
        $imageProp ='http://'. request()->getHttpHost().'/'. str_replace('public','storage',$image->path);
        return $imageProp;
        } catch (\Exception $exception) {
            return 'Not Found';
        }
    }
    public function handleEventcategory($id)
    {

        $category =EventCategory::with('SubCategories')->find($id);
        if (count($category->SubCategories)<1) {
            return response()->json('Not found',404);

        }
        $newSubCat =[];
        foreach ($category->subCategories as $key => $value) {
        $merged = array_merge($category->subCategories[$key]->toArray(),['image_url'=>$this->getSubCategoryImage($value->id)]);
            array_push($newSubCat,$merged);
        }
        $category->sub_categories = [];
        $category_copy = json_decode(json_encode($category));
        $category_copy->sub_categories = $newSubCat;
        return response()->json($category_copy);
    }
    public function fetchSubCategoryEvents($category_id,$sub_category_id)
    {
        $category =EventCategory::find($category_id);
        $subCategory = EventSubcategory::find($sub_category_id);
        $subCategoryEvents = Event::where('subCategory_id',$sub_category_id)
        ->where('category_id',$category_id)->latest()->get();
        $events = [];
        foreach ($subCategoryEvents as $key => $value) {
            $image= $this->getImage($value->id);
            $merged = array_merge($value->toArray(),['image_url'=>$image]);
            array_push($events,$merged);

        }
        if (count($subCategoryEvents)<1) {
        return response()->json('Not Found',404);

        }
        $merged = array_merge(['category'=>$category,
        'subCategory'=>$subCategory,
        'events'=>$events]);
        return response()->json($merged);
    }
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
            // $images =EventImage::where('event_id',$event->id)->first()->get();
            $imageProp = $this->getImage($event->id);
            $newObj =array_merge($event->toArray(),['image_url'=>$imageProp]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id,$sub_category_id,$eventId)
    {
        $eventDetails = Event::where('category_id',$category_id)
        ->where('subCategory_id',$sub_category_id)
        ->where('id',$eventId)->first();
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
