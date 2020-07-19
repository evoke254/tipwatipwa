<?php

namespace App\Http\Controllers;
use App\User;
use App\service;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function services()
    {
        $content = Page::where('page','Halal')->first();
        return view('admin.admin')->with(['content'=>$content, 'page'=>'halal']);
    }
    public function certification()
    {
        $content = Page::where('page','Halal Certification')->first();
        return view('admin.admin')->with(['content'=>$content, 'page'=>'certification']);
    }


    public function index()
    {    
        $homepage_content = content::first();
        return view('admin.admin', compact('homepage_content'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
       
        $user_updates = $request->all();

        if ($request->has('index')) {
            unset($user_updates['index']);
            $user_updates['index'] = 1;
         } 
    
        if ($request->file('image')) {
            $image = $request->file('image');
            $path = storage_path('app/public/images');   
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
            $image_name = $image->getClientOriginalName();
            $full_storage_path = $image->storeAs('public/images', $image_name);
            $user_updates['image'] = '/images/'.$image_name;
        }
        $content_in_db = Page::find($id);
        $update = $content_in_db->update($user_updates);
        if (! $update) {
            return response()
                    ->redirect()
                    ->back()
                    ->withError('So sorry something went wrong');
        } else {
            return redirect()->back()->withSuccess("Yaaay! Saved successfully");
        }

    }

    public function destroy($id)
    {
        //
    }
    public function MailConfig(Request $request)
    { 
        if ($request->has('password')) {
        putenv('MAIL_HOST='.$request->input('host'));
        putenv('MAIL_PORT='.$request->input('port'));
        putenv('MAIL_USERNAME='.$request->input('email'));
        putenv('MAIL_PASSWORD='.$request->input('password'));
        putenv('MAIL_ENCRYPTION='.$request->input('encryption'));
        putenv('MAIL_FROM_ADDRESS='.$request->input('email'));
            return view('MailConfig')->withSuccess('Mail Configurations Updated');        
        }

        return view('MailConfig');
    }
}
