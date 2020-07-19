<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    public function __construct()
    {
        $this->moduleName = 'service';
        $this->fields = ['Content'];
    }

    public function index()
    {

        $content = service::get();
        
//return phpinfo();

        return view('admin.services.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        //

        $newObject = $request->all();
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/service/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/service/'.$this->moduleName, $image_name);
                $newObject['picture_1'] = '/images/service/'.$this->moduleName.'/'.$image_name;   
        }

        $service = $newObject;    
        $insert = Service::create($service);

        if (!$insert) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " Saved");
        }
    }


    public function show(Service $service)
    {
        //
        $content = $service;
        return view('admin.services.create')->with(['content'=>$content]);
    }


    public function edit(Service $service)
    {
        $content = $service;
        return view('admin.services.create')->with(['content'=>$content]);
    }


    public function update(Request $request, Service $service)
    {
        
        $update = $request->all();
        
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

        $update_model = $service->update($update);

        if (!$update_model) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " Saved");
        }
    }


    public function destroy(Service $service)
    {
        
        $update_model = $service->delete();
        return redirect()->back()->withSuccess($this->moduleName. " deleted");
    }
}
