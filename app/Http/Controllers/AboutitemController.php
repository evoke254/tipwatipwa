<?php

namespace App\Http\Controllers;

use App\Aboutitem;
use App\Service;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class AboutitemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('about', 'fit', 'train', 'explore');
        $this->moduleName = 'about';
        $this->fields = ['Content'];
    }

    public function index()
    {
        $content = Aboutitem::get();
        return view('admin.services.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $newObject = $request->all();
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/about/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/about/'.$this->moduleName, $image_name);
                $newObject['image'] = '/images/about/'.$this->moduleName.'/'.$image_name;   
        }

        $carouselitem = $newObject;    
        $insert = Aboutitem::create($carouselitem);

        if (!$insert) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " Saved");
        }
    }

    public function show(Aboutitem $aboutitem)
    {
        //
        die();
    }

    
    public function edit(Aboutitem $aboutitem, $id)
    {
         $content = Aboutitem::find($id);
        return view('admin.about.create')->with(['content'=>$content]);
    }

    public function update(Request $request, Aboutitem $aboutitem, $id)
    {
         $update = $request->all();
        $update_payload = Aboutitem::find($id);
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/about/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/about/'.$this->moduleName, $image_name);
                $update['image'] = '/images/about/'.$this->moduleName.'/'.$image_name;   
        }

        $update = $update_payload->update($update);

        if (!$update) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " item updated");
        }
    }

    public function destroy(Aboutitem $aboutitem, $id)
    {
        $delete_model = Aboutitem::find($id)->delete();
        return redirect()->back()->withSuccess($this->moduleName. " item deleted");
    }

    public function about()
    {
        $about = Aboutitem::get();
        $services = Service::latest()->get();
        //dd($about);
        return view('about')->with(['content'=>$about, 'services'=>$services]);
    }


    public function fit()
    {
       return view('fitness_for_all'); 
    }
    public function train()
    {
       return view('motivate_and_train'); 
    }
    public function explore()
    {
       return view('explore_and_discover'); 
    }

}
