<?php

namespace App\Http\Controllers;

use App\Bulletin;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BulletinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('bulletins', 'download');
        $this->moduleName = 'bulletins';
        $this->fields = ['Title'];
    }
    public function index()
    {
        $content = Bulletin::latest()->get();
        return view('admin.bulletins.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    public function create()
    {
          return view('admin.bulletins.create');
    }

    public function store(Request $request)
    {
         $newObject = $request->all();
        if ($request->hasFile('file')) {
       
            $file = $request->file('file');
            $path = storage_path('app/public/bulletins/'.$this->moduleName);
            if(!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file_name = rand(1, 20).'_'.$file->getClientOriginalName();
            $gtpath = $file->storeAs('public/bulletins/'.$this->moduleName, $file_name);
            $newObject['path'] = '/bulletins/'.$this->moduleName.'/'.$file_name;   

            $pdf = new \Spatie\PdfToImage\Pdf($file);
            $thumbnail_name = rand(20, 5000).'.jpg';
            $pdf_path_name = storage_path('app/public/bulletins/'.$thumbnail_name);
            $pdf->saveImage($pdf_path_name);
            $newObject['thumbnail'] = '/bulletins/'.$thumbnail_name;
        }
        $insert = Bulletin::create($newObject);

        if (!$insert) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess("Bulletin Saved");
        }   
    }

    public function show(Bulletin $bulletin)
    {
        die();
    }

    public function edit(Bulletin $bulletin)
    {
        
        return redirect()->back()->withError(" Cannot update a document. Delete and upload another copy.");
    }

    public function update(Request $request, Bulletin $bulletin)
    {
        return redirect()->back()->withSuccess(" Cannot update a document. Delete and upload another copy.");
    }

    public function destroy(Bulletin $bulletin)
    {
        $bulletin->delete();
        
        return redirect()->back()->withSuccess("Bulletin deleted");
    }
     public function bulletins()
    {
        $content = Bulletin::latest()->get();
        return view('bulletins')->with(['content'=>$content]);
    }

    public function download(Request $request, $id)
    {
        $content = Bulletin::find($id);
        return view('download')->with(['content'=>$content]);
    }
}
