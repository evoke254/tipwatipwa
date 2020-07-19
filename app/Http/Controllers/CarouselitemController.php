<?php

namespace App\Http\Controllers;


use File;
use App\Carouselitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarouselitemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->moduleName = 'carousel';
        $this->fields = ['string'=>'heading', 'file'=>'image', 'text'=>'paragraph' ];
    }
    public function index()
    {

        $content = Carouselitem::get();
        return view('admin.read')
        ->with(['contents'=>$content, 
                'moduleName'=>$this->moduleName, 
                'fields'=>$this->fields]);
    }

    public function create()
    {
        $requestparams = ['moduleName'=>$this->moduleName, 'fields'=>$this->fields]; 
        return view('admin.create')->with(['requestparams'=>$requestparams]);
    }

    public function store(Request $request)
    {

        $newObject = $request->all();

        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/'.$this->moduleName, $image_name);
                $newObject['image'] = '/images/'.$this->moduleName.'/'.$image_name;   
        }

        $carouselitem = $newObject;    
        $insert = Carouselitem::create($carouselitem);

        if (!$insert) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " Saved");
        }
    }

    public function show(Carouselitem $carouselitem)
    {
        //
        die();
    }

    public function edit(Carouselitem $carouselitem, $id)
    {
        $moduleData = Carouselitem::find($id)->toArray();
        $requestparams = ['moduleName'=>$this->moduleName, 'fields'=>$this->fields, 'moduleData'=>$moduleData]; 
        return view('admin.edit')->with(['requestparams'=>$requestparams, 'moduleData'=>$moduleData]);
    }

    public function update(Request $request, Carouselitem $carouselitem, $id)
    {
        $update = $request->all();
        $carousel = Carouselitem::find($id);
        if ($request->has('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/'.$this->moduleName, $image_name);
                $update['image'] = '/images/'.$this->moduleName.'/'.$image_name;   
        }

        $update_model = $carousel->update($update);

        if (!$update_model) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " Saved");
        }
    }

    public function destroy(Carouselitem $carouselitem, $id)
    {
        $carousel = Carouselitem::find($id);
        $update_model = $carousel->delete();
        return redirect()->back()->withSuccess($this->moduleName. " deleted");

        
    }
}
