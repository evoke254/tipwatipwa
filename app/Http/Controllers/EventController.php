<?php

namespace App\Http\Controllers;

use App\Event;
use App\Service;
use App\User;
use App\PayOption;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->moduleName = 'events';
        $this->fields = ['trainer', 'services_id', 'status', 'cost'];
    }

    public function index()
    {
        $class_events = Event::latest()->get();
        $services = Service::all();
        $trainers = User::where('role', 'trainer')
                    ->get();
        $PayOptions = PayOption::all();

        return view('admin.events.schedule_editor', compact('class_events', 'services', 'trainers', 'PayOptions'));
    }

    public function create()
    {
        
          return view('admin.events.create');
    }

       public function store(Request $request)
    {
        if ($request->has('ajaxUpdateEvent')) {
                $updateEvent = Event::findOrFail($request->input('eventId'));
                $updateEvent->title = $request->input('title');
                $updateEvent->venue = $request->input('venue');
                $updateEvent->desc = $request->input('desc');
                $updateEvent->cost = $request->input('cost');
                $updateEvent->start = $request->input('start');
                $updateEvent->finish = $request->input('finish');
                $updateEvent->status = $request->input('status');
                $updateEvent->updated_at = now();


                if (! $updateEvent->save()) 
                {
                    return response()->json(['error' => $updateEvent]);
                } 
                elseif ($updateEvent->save()) 
                {
                    return response()->json(['success' =>'Event succesfully updated.']);   
                }
        } else {

                
                if ($request->input('repeatClass') == 'false') {
                    $createEvent = new Event;
                        if ($request->input('classOrEvent') == 'Event') {
                            $createEvent->title = $request->input('etitle');
                        $createEvent->desc = $request->input('desc');
                        } elseif ($request->input('classOrEvent') == 'Class') {
                           // $createEvent->title = $request->input('title');
                            $service = $this->services($request->input('title'));
                            $createEvent->title = $service->title;
                        $createEvent->desc = $request->input('desc'). '=> '.$service->desc;
                        }

                        $createEvent->classOrEvent = $request->input('classOrEvent');
                        $createEvent->code =  $this->classEventsCodeGenerator();
                        $createEvent->trainer = $request->input('trainer');  
                        $createEvent->venue = $request->input('venue');
                        $createEvent->cost = $request->input('cost');
                        $createEvent->start = $request->input('start');
                        $createEvent->finish = $request->input('finish');
                        $createEvent->status = $request->input('status');

                    if (! $createEvent->save()) 
                    {
                        return response()->json(['error' => $createEvent]);
                    } 
                    elseif ($createEvent->save()) 
                    {
                        return response()->json(['success' =>'Event saved succesfully.']);   
                    }
                } 
                elseif ($request->input('repeatClass') == 'true') {

                    $service = $this->services($request->input('title'));
                
                    date_default_timezone_set('Africa/Nairobi');
                    $endMonth = date('Y-m-t H:i:s');
                    
                    $title = $service->title;
                    $trainer = $request->input('trainer');
                    $classOrEvent = $request->input('classOrEvent');
                    $class_start_dateTime = $request->input('start');
                    $class_end_dateTime  = $request->input('finish');
                    $venue = $request->input('venue');
                    $desc = $request->input('desc'). '=> '.$service->desc;
                    $cost = $request->input('cost');
                    $status = $request->input('status');

                    while ( strtotime($class_start_dateTime) <= strtotime($endMonth) ) {
                        
                        $createEvent = new Event;
                        $createEvent->title = $title;
                        $createEvent->classOrEvent = $classOrEvent;
                        $createEvent->code =  $this->classEventsCodeGenerator();
                        $createEvent->trainer = $trainer;  
                        $createEvent->venue = $venue;
                        $createEvent->desc = $desc;
                        $createEvent->cost = $cost;
                        $createEvent->start = $class_start_dateTime;
                        $createEvent->finish = $class_end_dateTime;
                        $createEvent->status = $status;
                        $saved = $createEvent->save();

                        $class_start_dateTime = date('Y-m-d H:i:s', strtotime('+7 day', strtotime($class_start_dateTime)));
                        $class_end_dateTime = date('Y-m-d H:i:s', strtotime('+7 day', strtotime($class_end_dateTime)));
                    }
                    if (!$saved) {
                        return response()->json(['error' => $createEvent]);
                    }
                    else {
                        return response()->json(['success' =>'Classes populated succesfully.']); 
                    }

                }
            
        }

    }

    public function show(Event $event)
    {
        //
    }

    public function edit(Event $event)
    {
        //
    }

    public function update(Request $request, Event $event)
    {
        //
    }

    public function destroy(Event $event)
    {
        //
    }

    public function services($service_id)
    {
        $service = Service::where('id', $service_id)->first();
        return $service;
    }
}
