<?php

namespace App\Http\Controllers;

use App\Forms;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FormsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('forms', 'download');
        $this->moduleName = 'forms';
        $this->fields = ['Title'];
    }
    public function index()
    {
        $content = Forms::get();
        return view('admin.forms.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    public function create()
    {
          return view('admin.forms.create');
    }

    public function store(Request $request)
    {   
        $newObject = $request->all();
        if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = storage_path('app/public/files/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $file_name = rand(1, 20).'_'.$file->getClientOriginalName();
                $gtpath = $file->storeAs('public/files/'.$this->moduleName, $file_name);
                $newObject['path'] = '/files/'.$this->moduleName.'/'.$file_name;

                $pdf = new \Spatie\PdfToImage\Pdf($file);
                $thumbnail_name = rand(20,5000).'.jpg';
                $pdf_path_name = storage_path('app/public/files/'.$thumbnail_name);
                $pdf->saveImage($pdf_path_name);
                $newObject['thumbnail'] = '/files/'.$thumbnail_name;
        }

        $carouselitem = $newObject;    
        $insert = Forms::create($carouselitem);

        if (!$insert) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess("Document Saved");
        }   
    }

    public function show(Forms $forms)
    {
        die();
    }

    public function edit(Forms $forms)
    {
        return redirect()->back()->withSuccess(" Cannot update a document. Delete and upload another copy.");
    }

    public function update(Request $request, Forms $forms)
    {
        return redirect()->back()->withSuccess(" Cannot update a document. Delete and upload another copy.");
    }

    public function destroy(Forms $forms, $id)
    {
        Forms::find($id)->delete();
        
        return redirect()->back()->withSuccess("Document deleted");
    }



    public function forms()
    {
        
        $content = Forms::get();
        return view('forms')->with(['content'=>$content]);
    }
    public function download(Request $request, $id)
    {
        $content = Forms::find($id);
        return view('download')->with(['content'=>$content]);
    }
}
