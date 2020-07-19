<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'blogs');
        $this->moduleName = 'blog';
        $this->fields = ['Title'];
    }
    public function index()
    {
        $content = Blog::get();
        return view('admin.blog.read')->with(['contents'=>$content, 
                                                'moduleName'=>$this->moduleName, 
                                                'fields'=>$this->fields]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $newObject = $request->all();
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/blog/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/blog/'.$this->moduleName, $image_name);
                $newObject['image'] = '/images/blog/'.$this->moduleName.'/'.$image_name;   
        }

        $carouselitem = $newObject;    
        $insert = Blog::create($carouselitem);

        if (!$insert) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " Saved");
        }
    }

    public function show(Blog $blog, $id)
    {
        $post = Blog::find($id);
        $allposts = Blog::get();
        return view('blog-post')->with(['post'=>$post, 'posts'=>$allposts]);
    }

    public function edit(Blog $blog)
    {
         $content = $blog;
        return view('admin.blog.create')->with(['content'=>$content]);
    }

   
    public function update(Request $request, Blog $blog)
    {
        $update = $request->all();

        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = storage_path('app/public/images/blog/'.$this->moduleName);
                if(!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true);
                }
                $image_name = rand(1, 20).'_'.$image->getClientOriginalName();
                $gtpath = $image->storeAs('public/images/blog/'.$this->moduleName, $image_name);
                $update['image'] = '/images/blog/'.$this->moduleName.'/'.$image_name;   
        }

        $update = $blog->update($update);

        if (!$update) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withError("Something went wrong: Make sure all fields are filled correctly");
        } else {
            return redirect('/admin/'.$this->moduleName)->withSuccess($this->moduleName. " item updated");
        }
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->withSuccess($this->moduleName. " item deleted");
    }
    public function blogs()
    {
        $blogs = Blog::latest()->get();
        return view('blog')->with(['posts'=>$blogs]);

    }
}
