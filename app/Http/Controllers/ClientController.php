<?php

namespace App\Http\Controllers;

use App\Client;
use Alert;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('certified', 'decertified', 'search');
        $this->moduleName = 'clients';
        $this->fields = ['Name','Status','Certificate ID', 'Mobile', 'Email', 'Address'];
    }
    public function index()
    {
        $content = Client::latest()->get();
      //  dd($content);
        return view('admin.clients.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $client = $request->all();

        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/clients/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/clients/'.$this->moduleName, $image_name);
                $client['image'] = '/images/clients/'.$this->moduleName.'/'.$image_name;   
        }


        $insert = Client::create($client);
        if (!$insert) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess("CLient Saved");
        }   
    }

    public function show(Client $client)
    {
        return view('admin.clients.show')->with(['client'=>$client]);
    }

    public function edit(Client $client)
    {
        return view('admin.clients.create')->with(['content'=>$client]);
    }

    public function update(Request $request, Client $client)
    {
        $update = $request->all();
       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = storage_path('app/public/images/clients/'.$this->moduleName);
            if(!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true);
            }
            $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
            $gtpath = $image->storeAs('public/images/clients/'.$this->moduleName, $image_name);
            $update['image'] = '/images/clients/'.$this->moduleName.'/'.$image_name;   
        }
        $insert = $client->update($update);
        if (!$insert) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess("Client details updated");
        }   
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/admin/'.$this->moduleName)->withSuccess("Client deleted");
    }


    public function certified()
    {
        $certified_clients = Client::get()->where('Status', 'Certified');
        return view('certified')->with(['content'=>$certified_clients]);
    }
        public function decertified()
    {
        $decertified_clients = Client::get()->where('Status', 'Decertified');
        return view('decertified')->with(['content'=>$decertified_clients]);
    }

     public function search(Request $request)
    {
        $search = request()->input('search');
        $result = Client::where('Name', 'RLIKE', $search)
                          ->where('Status', 'Certified')->get();
        if ($result->count() < 1) {
            return redirect()->back()->withWarning('No client name matches the phrase : '.$search);
        }
        return view('search')->with(['content'=>$result, 'search'=>$search]);
        
    }
}
