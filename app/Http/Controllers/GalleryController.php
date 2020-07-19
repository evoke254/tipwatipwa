<?php

namespace App\Http\Controllers;

use App\gallery;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('gallery');
        $this->moduleName = 'gallery';
        $this->fields = ['Picture'];
    }
    public function index()
    {
        $content = gallery::get();
        return view('admin.gallery.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {

        $allowed = ['jpeg', 'jpg', 'JPEG', 'PNG', 'png', 'gif'];
        $image = $request->file('file');
        $file_ext = $image->getClientOriginalExtension();

        if (!in_array($file_ext, $allowed)) {
            return response('Wrong file type', 500);
            }

        $newObject = $request->all();
        $path = storage_path('app/public/images/'.$this->moduleName);
        if(!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }
        $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
        $gtpath = $image->storeAs('public/images/'.$this->moduleName, $image_name);
        $newObject['image'] = '/images/'.$this->moduleName.'/'.$image_name;   

        $gallery = $newObject;    
        $insert = gallery::create($gallery);

        if (!$insert) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " Saved");
        }
    }

    public function show(gallery $gallery)
    {
        //
    }

    public function edit(gallery $gallery)
    {
        //
    }

    public function update(Request $request, gallery $gallery)
    {
        //
    }

    public function destroy(gallery $gallery)
    {
        $gallery->delete();
        return redirect('/admin/'.$this->moduleName)->withSuccess("Photo deleted Saved");
    }
    public function gallery()
    {
        $content = gallery::get();

        return view('gallery')->with(['content'=>$content]);
    }
}
