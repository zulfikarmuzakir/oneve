<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventTicket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        // $date = Event::find(2)->event_tickets->orderBy('ticket_price');
        // $categories = ['Bisnis', 'Edukasi', 'Konferensi', 'Konser', 'Seminar', 'Theater', 'UI/UX', 'Webinar'];
        
        // dd(count($categories));
        return view('home', compact('events'));
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $date_now = Carbon::now()->toDateString();
        $date_tomorrow = Carbon::tomorrow()->toDateString();
        $start_of_week = Carbon::now()->startOfWeek()->toDateString();
        $next_start_of_week = Carbon::now()->startOfWeek()->addWeeks(1)->toDateString();
        $end_of_week = Carbon::now()->endOfWeek()->toDateString();
        $next_end_of_week = Carbon::now()->endOfWeek()->addWeeks(1);
        $this_month = Carbon::now()->month;
        $next_month = Carbon::now()->addMonth()->month;
        // dd($next_month);
        $req_categories = $request->categories;
        $req_time = $request->time;
        $req_type_event = $request->type_event;
        $req_sort_by = $request->sortBy;
        $keyword = $request->search;
        
        $event_categories = explode(",", $request->categories);
        
        $categories = Category::all();
        $events = Event::where('event_name', 'like', "%" . $keyword . "%");
        // dd($events->event_tickets->where('ticket_type', 'paid')->first());
        if ($request->categories) {
            $events = $events->whereIn('category_id', $event_categories);
        }

        if ($req_time) {
            switch ($req_time) {
                case 'today':
                    $events->where('date_start', $date_now);
                    break;
                case 'tomorrow':
                    $events->where('date_start', $date_tomorrow);
                    break;
                case 'endofweek':
                    $events->where('date_start', $end_of_week);
                    break;
                case 'thisweek':
                    $events->whereBetween('date_start', [$start_of_week, $end_of_week]);
                    break;
                case 'nextweek':
                    $events->whereBetween('date_start', [$next_start_of_week, $next_end_of_week]);
                    break;
                case 'thismonth':
                    $events->whereMonth('date_start', $this_month);
                    break;
                case 'nextmonth':
                    $events->whereMonth('date_start', $next_month);
                    break;
            }
        }

        if ($req_sort_by) {
            switch ($req_sort_by) {
                case 'a-z':
                    $events->orderBy('event_name', 'asc');
                    break;
                
                case 'z-a':
                    $events->orderBy('event_name', 'desc');
                    break;
                default:
                    
                    break;
            }
        }

        $events = $events->paginate(5);

        return view('search', compact('events', 'categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function search_category(Request $request)
    {
     
        // dd($request->categories);
        // $categories = Category::all();
        $event = Event::whereIn('id', $request->categories)->get();
        // dd($event);

        // return view('search', compact('events', 'categories'));
        return response()->json(['data' => $event]);

    }

    public function sortBy(Request $request)
    {
        
    }
}
