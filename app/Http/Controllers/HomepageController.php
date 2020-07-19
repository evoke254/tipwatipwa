<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\webmails;
use App\Mail\mymail;
use App\Carouselitem;
use App\HomepageItem;
use App\Aboutitem;
use App\Question;
use Alert;
use App\Client;
use App\Blog;
use App\Bulletin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Storage;
class HomepageController extends Controller
{
    public function __construct()
    {
     //   $this->middleware('auth');
    }
    public function index()
    {
        $carouselitems = Carouselitem::get();
        $homepage_content =HomepageItem::get();
        $Bulletin = Bulletin::latest()->get()->first();
        $posts = Blog::latest()->get();
        $clients = Client::latest()->where('Image', '!=', 'null')->take(15)->inRandomOrder()->get();

//        $quarter = ceil($clients->count() / 4);
//        $client_chunks = $clients->chunk($quarter);

        return view('homepage')->with(['carouselitems'=>$carouselitems, 'homepage_content'=>$homepage_content, 'bulletin'=>$Bulletin, 'posts'=>$posts, 'clients'=>$clients]);
    }    

    public function  contact()
    {
        return view('contact');
    }

    public function faqs()
    {
        $Questions = Question::get();
        return view('faqs')->with(['questions'=>$Questions]);
    }


    public function webmail(Request $request)
    {
		$user_email = $request->get('email');
		$to = 'info@kbhc.info';
		$mail1 = Mail::to($to)
					->cc($cc)
				    ->send(new mymail($request));

		$mail2 = Mail::to($user_email)
					    ->send(new webmails($request));
		if ($mail1 == null && $mail2==null) {
			return redirect()->back()->withSuccess("Email sent successfuly");
		} else {
			return redirect()->back()->withError("Error". $mail1." and ".$mail2);
		}
    }
    
    public function complaints_appeals(Request $request)
    {

        $to = 'helpline@kbhc.info';
        $mail1 = Mail::to($to)
                    ->send(new mymail($request));

        if ($mail1 == null) {
            return redirect()->back()->withSuccess("Complaint or appeal sent successfuly");
        } else {
            return redirect()->back()->withError("Error ". $mail1);
        }
    }


    
    public function certification_process()
    {
        return view('certification_process');
    }
    public function complaints()
    {
        return view('complaints');
    }
}
