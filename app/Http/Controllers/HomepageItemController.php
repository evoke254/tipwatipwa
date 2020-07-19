<?php

namespace App\Http\Controllers;

use App\HomepageItem;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class HomepageItemController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->moduleName = 'homepage';
        $this->fields = ['Page Title', 'Content'];
    }

    public function index()
    {
        $content = HomepageItem::get();
        return view('admin.homepage.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    
    public function create()
    {
        return view('admin.homepage.create');
    }

    public function store(Request $request)
    {
        $newObject = $request->all();
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/homepage/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/homepage/'.$this->moduleName, $image_name);
                $newObject['image'] = '/images/homepage/'.$this->moduleName.'/'.$image_name;   
        }

        $carouselitem = $newObject;    
        $insert = HomepageItem::create($carouselitem);

        if (!$insert) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " Saved");
        }
    }

   
    public function show(HomepageItem $homepageItem)
    {
        //
        die();
    }


    public function edit(HomepageItem $homepageItem, $id)
    {
        $content = HomepageItem::find($id);
        return view('admin.homepage.create')->with(['homepage_content'=>$content]);
    }

  
    public function update(Request $request, HomepageItem $homepageItem, $id)
    {
        $update = $request->all();
        $homepage_item = HomepageItem::find($id);
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/homepage/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/homepage/'.$this->moduleName, $image_name);
                $update['image'] = '/images/homepage/'.$this->moduleName.'/'.$image_name;   
        }

        $update = $homepage_item->update($update);

        if (!$update) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " item updated");
        }
    }

    public function destroy(HomepageItem $homepageItem, $id)
    {
        
        $homepage_item = HomepageItem::find($id);
        $update_model = $homepage_item->delete();
        return redirect()->back()->withSuccess($this->moduleName. " item deleted");
    }
}
