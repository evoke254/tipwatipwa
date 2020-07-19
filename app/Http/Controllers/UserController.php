<?php

namespace App\Http\Controllers;

use App\User;
use Alert;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth')->except('trainers');
        $this->moduleName = 'users';
        $this->fields = ['pic','name','email','role'];
    }

    public function index()
    {
        $content = User::latest()->get();
        return view('admin.users.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $client = $request->all();

        if ($request->hasFile('pic')) {
                $image = $request->file('pic');
                $path = storage_path('app/public/images/users/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/users/'.$this->moduleName, $image_name);
                $client['pic'] = '/images/users/'.$this->moduleName.'/'.$image_name;   
        }

        $client['password'] = bcrypt($client['password']);

        $insert = User::create($client);
        if (!$insert) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess("User Saved");
        }   
    }
    public function show(User $user)
    {
        return view('admin.users.show')->with(['user'=>$user]);
    }
    public function edit(User $user)
    {
        return view('admin.users.create')->with(['content'=>$user]);
    }

     public function update(Request $request, User $user)
    {
        $update = $request->all();
       if ($request->hasFile('pic')) {
            $image = $request->file('pic');
            $path = storage_path('app/public/images/users/'.$this->moduleName);
            if(!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }
            $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
            $gtpath = $image->storeAs('public/images/users/'.$this->moduleName, $image_name);
            $update['pic'] = '/images/users/'.$this->moduleName.'/'.$image_name;   
        }
		
		if ($request->has('password')) {
		        $update['password'] = bcrypt($update['password']);
		}


        $insert = $user->update($update);
        if (!$insert) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess("Client details updated");
        }   
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/'.$this->moduleName)->withSuccess("User deleted");
    }
}
