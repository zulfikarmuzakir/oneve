<?php

namespace App\Http\Controllers;

use App\Models\BuyTicketEvent;
use App\Models\Event;
use App\Models\FavoriteEvent;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class DashboardController extends Controller
{
    public function home()
    {
        $user_id = Auth::user()->id;
        $profile = User::where('id', $user_id)->first();
        $count_active_event = Event::where('user_id', $user_id)->where('status', 'published')->where('date_end', '>=', date('Y-m-d'))->count();
        $count_passed_event = Event::where('user_id', $user_id)->where('status', 'published')->where('date_end', '<=', date('Y-m-d'))->count();
        $count_drafted_event = Event::where('user_id', $user_id)->where('status', 'draft')->count();
        $count_favorited_event = FavoriteEvent::where('user_id', $user_id)->count();
        $count_pendapatan = Order::where('seller_id', Auth::user()->id)->sum('total_price');

        // $count
        // dd($count_favorited_event);
        // $draftedEvent = Event::where('user_id', $user_id)->count();
    
        // dd($favoritedEvent);

        return view('profile.dashboard.home', compact('profile', 'count_active_event', 'count_passed_event', 'count_drafted_event', 'count_favorited_event', 'count_pendapatan'));
    }

    public function profile()
    {
        $profile = User::where('id', Auth::user()->id)->first();

        return view('profile.dashboard.profile-info', compact('profile'));
    }

    public function ongoingEvent(Request $request)
    {
        $user_id = Auth::user()->id;
        $keyword = $request->keyword;
        $list_user_event = Event::where('user_id', $user_id);
        if ($keyword) {
        $list_user_event = $list_user_event->where('event_name', 'like', "%" . $keyword . "%")->paginate(5);
        } else {
        }
        $list_user_event = $list_user_event->paginate(5);
        
        
        // dd($list_user_event);
        // dd($list_user_event->event_name);
        // dd($list_user_event);

        return view('profile.dashboard.user-event-ongoing', compact('list_user_event'));
    }

    public function endedEvent()
    {
        $user_id = Auth::user()->id;
        $list_user_event = Event::where('user_id', $user_id)->get();

        return view('profile.dashboard.user-event-end', compact('list_user_event'));
    }

    public function draftedEvent()
    {
        $user_id = Auth::user()->id;
        $list_user_event = Event::where('user_id', $user_id)->get();

        return view('profile.dashboard.user-event-drafted', compact('list_user_event'));
    }

    public function favoritedEvent()
    {
        $user_id = Auth::user()->id;
        $list_favorited_event = FavoriteEvent::where('user_id', $user_id)->get();

        return view('profile.dashboard.favorited-event', compact('list_favorited_event'));
    }

    public function draftEvent($id)
    {
        $event = Event::find($id);
        $event->status = "drafted";
        $event->save();

        return redirect()->back();
    }

    public function orderData($id)
    {
        $events = Event::where('user_id', $id)->get();
        $order = Order::where('seller_id', $id)->get();  
        // dd($order);

        $transaction_data = [];

        foreach ($order as $key => $value) {
            $order_data = $value;
            $url_data = "https://api.sandbox.midtrans.com/v2/".$order_data->order_number."/status";
            $client = new Client();
            $url = $url_data;
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization'=> 'Basic '.base64_encode(env('MIDTRANS_SERVER_KEY')),
            ];
    
            $response = $client->request('GET', $url, [
                // 'json' => $params,
                'headers' => $headers,
                'verify'  => false,
            ]);

            $responseBody = json_decode($response->getBody());
            $transaction_data[] = $responseBody;
          
        }
        // $order_data = Order::where('')

        // $order_data = array_merge($order, $transaction_data);
        // dd($order_data);
        // dd($transaction_data);

        // echo $responseBody;
            // dd($responseBody);

            return view('profile.dashboard.order-data', compact('order', 'events', 'transaction_data'));
            
    }

    public function downloadOrderData()
    {
        $events = Event::where('user_id', Auth::user()->id)->get();
        $order = Order::where('seller_id', Auth::user()->id)->get();  
        // dd($order);

        $transaction_data = [];

        foreach ($order as $key => $value) {
            $order_data = $value;
            $url_data = "https://api.sandbox.midtrans.com/v2/".$order_data->order_number."/status";
            $client = new Client();
            $url = $url_data;
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization'=> 'Basic '.base64_encode(env('MIDTRANS_SERVER_KEY')),
            ];
    
            $response = $client->request('GET', $url, [
                // 'json' => $params,
                'headers' => $headers,
                'verify'  => false,
            ]);

            $responseBody = json_decode($response->getBody());
            $transaction_data[] = $responseBody;
        }

        $order_data = array_merge($order, $transaction_data);
        dd($order_data);

        return view('profile.dashboard.order-data', compact('order', 'events', 'transaction_data'));
    }

    public function orderDataDetail($order_id)
    {
        $events = Event::where('user_id', Auth::user()->id)->first();
        $order = Order::find($order_id);  
        $customer = BuyTicketEvent::where('order_id', $order->id)->get();
        // dd($customer);
        // dd($order);
        $url_data = "https://api.sandbox.midtrans.com/v2/".$order->order_number."/status";
            // echo $responseBody;

        $client = new Client();
            $url = $url_data;
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization'=> 'Basic '.base64_encode(env('MIDTRANS_SERVER_KEY')),
            ];
    
            $response = $client->request('GET', $url, [
                // 'json' => $params,
                'headers' => $headers,
                'verify'  => false,
            ]);

            $responseBody = json_decode($response->getBody());

            return view('profile.dashboard.order-data-detail', compact('events', 'order', 'responseBody'));
    }

    public function event_history()
    {

        $event_history = Order::where('customer_name', Auth::user()->name)->get(); 
        // dd($event_history);

        return view('profile.dashboard.history', compact('event_history'));
    }
}
