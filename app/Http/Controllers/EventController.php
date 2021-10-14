<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use App\Models\EventTicket;
use App\Models\FavoriteEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Auth::user()->membership->where('user_id', Auth::user()->id)->orderByDesc('created_at')->first()->id);
        // dd('2021-09');
        $user = Auth::user();
        $categories = Category::all();
        return view("profile.event.create", compact('user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(date('d-m-Y', strtotime($request->ticket_date_start[0])));
        // $this->validate($request, []);

        $input = $request->all();
        $rules = ['imageUpload' => 'required'];
        $messages = [];
        $validator = Validator::make($request->all() , $rules, $messages);
        if ($validator->fails())
        {
            // $arr = array( "status" => 400, "msg" => $validator->errors() ->first(), "result" => array());
            \Session::flash('error', $validator->errors()->first());
        }
        else
        {
            try
            {
                if ($input['base64image'] || $input['base64image'] != '0') {
                    
                    $folderPath = public_path('img/banner/');
                    $image_parts = explode(";base64,", $input['base64image']);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    $file = $folderPath . uniqid() . '.png';
                    $filename = time() . '.'. $image_type;
                    $file =$folderPath.$filename;
                    $image_file = '/img/banner/'. $filename;
                    file_put_contents($file, $image_base64);
                }
                $msg = 'Image upload successfully.';
                \Session::flash('message', $msg );
            }
            catch(\Illuminate\Database\QueryException $ex)
            {
                $msg = $ex->getMessage();
                if (isset($ex->errorInfo[2]))
                {
                    $msg = $ex->errorInfo[2];
                }
                \Session::flash('error', $msg);
                
            }
            catch(Exception $ex)
            {
                $msg = $ex->getMessage();
                if (isset($ex->errorInfo[2]))
                {
                    $msg = $ex->errorInfo[2];
                }
                \Session::flash('error', $msg);
            }
        }
        
        // dd($filename);


       $slug = Str::slug($request->event_name, '-');

        $event = Event::create([
            'banner' => $image_file,
            'event_name' => $request->event_name,
            'date_start' => date('Y-m-d', strtotime($request->date_start)),
            'date_end' => date('Y-m-d', strtotime($request->date_end)),
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'max_ticket_user' => $request->ticket_max,
            'status' => "published",
            'category_id' => Category::where('name', $request->category_name)->first()->id,
            'slug' => $slug,
        ]);

        if ($request->ticket_price > 0) {
            $ticket_type = "paid";
        } else {
            $ticket_type = "free";
        }

        $data_ticket = [];

        for ($i=0; $i < count($request->ticket_name); $i++) {
            $data_ticket[] = [
                'event_id' => $event->id,
                'ticket_name' => $request->ticket_name[$i],
                'ticket_total' => $request->ticket_stock[$i],
                'ticket_date_start' => date('Y-m-d', strtotime($request->ticket_date_start[$i])),
                'ticket_date_end' => date('Y-m-d', strtotime($request->ticket_date_end[$i])),
                'ticket_time_start' => $request->ticket_time_start[$i],
                'ticket_time_end' => $request->ticket_time_end[$i],
                'ticket_type' => $ticket_type,
                'ticket_price' => ($request->ticket_price > 0) ? $request->ticket_price[$i] : 0,
                'event_link' => $request->link[$i],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        $create = EventTicket::insert($data_ticket);

        // dd($create);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEvent($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $user = User::find($event->user_id);
        $favorited = FavoriteEvent::where('event_id', $event->id);
        $favorited_total = $favorited->count();

        $shareComponent = \Share::currentPage("Sharing event")
        ->twitter()
        ->whatsapp();

        // dd(Auth::user()->favoritedEvent->where('user_id', Auth::user()->id)->first()->id);
        // dd($user->avatar);
        return view('profile.buyevent.show', compact('event', 'user', 'favorited_total', 'shareComponent'));
    }

    public function list()
    {
        // dd(Event::where('user_id', Auth::user()->id)->orderByDesc('created_at')->get());
        $event = Event::where('user_id', Auth::user()->id)->get();


        return view('profile.event.list', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
