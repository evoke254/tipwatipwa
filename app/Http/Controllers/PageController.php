<?php

namespace App\Http\Controllers;

use App\Page;
use App\Event;
use App\User;
use App\Service;
use Illuminate\Http\Request;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Collection;

use DateTime;
use DateInterval;
use DatePeriod;

class PageController extends Controller
{

    public function hikes()
    {
        $events = Event::where('classOrEvent','Event')->latest()->get();
        return view('events')->with(['events'=>$events]);
    }

    public function classes()
    {
        $content = Event::where('classOrEvent','Class')->latest()->get();
        return view('events')->with(['content'=>$content]);
    }
    public function trainers()
    {
        
        $trainers = User::where('role', 'trainer')->get();  
        return view('trainers')->with(['trainers'=>$trainers]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Page $page)
    {
        //
    }

    public function edit(Page $page)
    {
        //
    }

    public function update(Request $request, Page $page)
    {
        //
    }

    public function destroy(Page $page)
    {
        //
    }

    public function schedule(Request $request)
    {
        $trainers = User::where('role', 'trainer')->get();         
        $services = Service::latest()->get();
        $class_events = $this->getSchedule($request);

        if ((! is_array($class_events)) && DateTime::createFromFormat('Y-m-d', $class_events->keys()->first()) ) {
                $days = $class_events->keys();
                $datef = $this->formatday($days);
                $monthf = $this->getMonth($days);
                $daysArr = $this->daysArray($days);

                return view('schedule', compact('trainers','monthf','datef', 'daysArr','class_events', 'services'));   
        }
        elseif ($request->ajax() && ($class_events)->isNotEmpty()){
            return response()->json($class_events);
        }
        else {
//            dd('dd');
            return redirect()->back()->withWarning("Ooops, no events Scheduled. Please call us for enquiries");  
        }

    }


    public function getSchedule(Request $request)
    {
        
        date_default_timezone_set('Africa/Nairobi');
        $today = date('Y-m-d');
        if ($request->has('getPrevWeek')) {
                $week = $request->input('week') - 1;
                $year = $request->input('year');
        } elseif ( $request->has('getNextWeek')) {
                $week = $request->input('week1') + 1;
                $year = $request->input('year1');
        }
        else
        {
                $week = date('W');
                $year = date('Y');
        }
        $DateTime = new DateTime();
        $week_start = $DateTime->setISODate($year, $week)->format('Y-m-d');
        $week_end = $DateTime->modify('+7 days')->format('Y-m-d');
        //get an array of the week.
        $class_events[] = array();
        $begin = new DateTime($week_start);
        $end = new DateTime($week_end);
        $interval = new DateInterval('P1D');
        $dateRange = new DatePeriod($begin, $interval, $end);

        $begin = $begin->format('Y-m-d H:i:s');
        $end = $end->format('Y-m-d H:i:s');


                //loop to get nested array of the dates with associated events/classes.
                if($request->ajax()) {
                    //my ajax calls later
                    if ($request->has('next') && $request->has('mobile')) 
                    {
                        $beginD = $request->input('begin');
                        $begin = date('Y-m-d H:i:s', strtotime($beginD. '+1 days'));
                        $end = date('Y-m-d H:i:s', strtotime($beginD. '+2 days'));

                        $class_events = DB::table('class_events')
                                    ->where('start', '>=', $begin)
                                    ->where('start', '<=', $end)
                                    ->get()
                                    ->sortByDesc('start');

                    }
                    elseif ($request->has('prev') && $request->has('mobile')) {
                        $beginP = $request->input('begin');
                        $begin = date('Y-m-d H:i:s', strtotime($beginP));
                        $end = date('Y-m-d H:i:s', strtotime($beginP. '-1 days'));
                        
                        $class_events = DB::table('class_events')
                                    ->where('start', '>=', $end)
                                    ->where('start', '<=', $begin)
                                    ->get()
                                    ->sortByDesc('start'); 
                        }

                }
                else {
                    $class_events = Event::where('start', '>=', $begin)
                                    ->where('start', '<=', $end)
                                    ->get()
                                    ->groupBy(function($classByDay){
                                        return Carbon::parse($classByDay->start)->format('Y-m-d'); 
                                    })
                                    ->sortKeys()
                                    ->sortByDesc('start');
                }
            return($class_events);
                    
    }

    public function formatday($date)
    {
        $array_date = $date->toArray();
        asort($array_date);
        foreach ($array_date as $dte) {
            $Date = new DateTime($dte);
            $daysf[] = $Date->format('D jS');
        }
        return($daysf);
    }
    public function getMonth($date)
    {
        $array_date = $date->toArray();
        asort($array_date);
        foreach ($array_date as $dte) {
            $Date = new DateTime($dte);
            $getMonth['month'] = $Date->format('F');
            $getMonth['week'] = $Date->format('W');
            $getMonth['year'] = $Date->format('Y');
        }
        return($getMonth);
    }

    public function daysArray($sort_date)
    {
        $sort_date->sortKeys();
        foreach ($sort_date as $dte) {
            $Date = new DateTime($dte);
            $daysArr[] = $Date->format('Y-m-d');
        }
        return($daysArr);
    }
    
}
