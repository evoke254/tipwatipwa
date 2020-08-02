<?php

namespace App\Http\Controllers\Api\Back;

use App\CategoryImage;
use App\EventSubcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventSubcategoryController extends Controller
{
    private function getImage($category_id){

        $image =CategoryImage::where('type_id',$category_id)->where('type',True)->get()->first();
        $imageProp ='http://'. request()->getHttpHost().'/'. str_replace('public','storage',$image->path);
        return $imageProp;
    }
    public function getAll()
    {
        try {
            $subCategories =EventSubcategory::with('category')->get();
            $cleaned = [];
            foreach ($subCategories as $key => $value) {
                $image_path = $this->getImage($value->id);
                $newArr = array_merge($value->toArray(),['image_url'=>$image_path]);
                array_push($cleaned,$newArr);
            }
            return $cleaned;
            } catch (\Exception $exception) {
                return response()->json($exception->getMessage(),500);
            }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
        $subCategories =EventSubcategory::all();
        $cleaned = [];
        foreach ($subCategories as $key => $value) {
            $image_path = $this->getImage($value->id);
            $newArr = array_merge($value->toArray(),['image_url'=>$image_path]);
            array_push($cleaned,$newArr);
        }
        return response()->json($cleaned,200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),500);
        }
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

            foreach ($request->file('images') as $key => $value) {
                $fileName = $request->file('images')[$key]->store('public/event_images');
                CategoryImage::create([
                    'path'=>$fileName,
                    'type_id'=>$data->id,
                    'type'=>True
                ]);
            }
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
    public function destroy(EventSubcategory $eventSubcategory,$id)
    {
        try {
            $deleted = EventSubcategory::destroy($id);
            return response()->json($deleted,200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),500);
        }
    }
}
