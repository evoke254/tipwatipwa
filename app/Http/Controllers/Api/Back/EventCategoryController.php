<?php

namespace App\Http\Controllers\Api\Back;

use App\CategoryImage;
use App\EventCategory;
use App\EventImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    private function getImage($category_id){

        $image =CategoryImage::where('type_id',$category_id)->where('type',False)->get()->first();
        $imageProp ='http://'. request()->getHttpHost().'/'. str_replace('public','storage',$image->path);
        return $imageProp;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

        $categories = EventCategory::with('SubCategories')->get();
        $cleaned_category =[];
        foreach ($categories as $key => $value) {
            $image_path = $this->getImage($value->id);
            $newVal = array_merge($value->toArray(),['image_url'=>$image_path]);
            array_push($cleaned_category,$newVal);
        }
        $sub_cat = new EventSubcategoryController();
        $sub_cat = $sub_cat->getAll();
        $merged = ['categories'=>$cleaned_category,'sub_categories'=>$sub_cat];

        return response()->json($merged,200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),500);
        }
    }
    public function frontIndex()
    {
        try {

            $categories = EventCategory::with('SubCategories')->get();
            $cleaned_category =[];
            foreach ($categories as $key => $value) {
                $image_path = $this->getImage($value->id);
                $newVal = array_merge($value->toArray(),['image_url'=>$image_path]);
                array_push($cleaned_category,$newVal);
            }

            return response()->json($cleaned_category,200);
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
            $eventCategory = EventCategory::create([
                'name' => $request->input('name')
            ]);

            foreach ($request->file('images') as $key => $value) {
                $fileName = $request->file('images')[$key]->store('public/event_images');
                CategoryImage::create([
                    'path'=>$fileName,
                    'type_id'=>$eventCategory->id,
                    'type'=>False
                ]);
            }
            return response()->json($eventCategory);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $category = EventCategory::find($id);
            return response()->json($category);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 404);
        }
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
        try {
            $category = EventCategory::find($id);
        $category->name = $request->input('name');
        $image = CategoryImage::where('type',0)->where('type_id',$id)->first();
        foreach ($request->file('images') as $key => $value) {
            $fileName = $request->file('images')[$key]->store('public/event_images');
            $image->path =$fileName;
        }
        return response()->json($category,200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),500);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleted = EventCategory::destroy($id);
            return response()->json($deleted,200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),500);
        }
    }
}
