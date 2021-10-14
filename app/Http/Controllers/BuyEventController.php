<?php

namespace App\Http\Controllers;

use App\Models\BuyTicketEvent;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendDataToEmail;
use App\Models\EventTicket;
use App\Models\Order;
use App\Models\Profile;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Midtrans\CreateSnapTokenService;
use GuzzleHttp\Client;

use function Complex\rho;

class BuyEventController extends Controller
{
    public function createOrderData(Request $request, $id)
    {
        // dd($request->all());

        // dd(Auth::user()->profile->where('user_id', Auth::user()->id)->first());
        
        session(['ticket_total' => request()->input('ticket_total')]);
        session(['ticket_id' => request()->input('ticket_id')]);
        session(['total_price' => request()->input('subtotal-hidden')]);

        // $user_profile = Auth::user()->profile->where('user_id', Auth::user()->id)->first();
        if (Profile::where('user_id', Auth::user()->id)->exists()) {
            $customer_phone_number = Auth::user()->profile->where('user_id', Auth::user()->id)->first()->phone_number;
        } else {
            $customer_phone_number = null;
        }

        // dd($request->all());
        $event = Event::find($id);
        $total_price = session()->get('total_price');

        $createOrder = Order::create([
            'seller_id' => $event->user_id,
            'order_number' => mt_rand(10000000,99999999),
            'total_price' => $total_price,
            'customer_name' => Auth::user()->name,
            'customer_email' => Auth::user()->email,
            'customer_phone_number' => $customer_phone_number,
            'payment_status' => "1",
            'event_id' => $event->id,
        ]);
        
        // dd($createOrder->id);

        session(['order_id' => $createOrder->id]);

        return redirect()->route('event.buy', ['id' => $event->id]);
    }

    public function toPersonalData(Request $request, $id)
    {
       
        $event = Event::find($id);
        $ticket_qty = session()->get('ticket_total');
        $total_price = session()->get('total_price');
        $list_ticket_id = session()->get('ticket_id');
        $order_id = session()->get('order_id');
        $order = Order::find($order_id);

        // dd(EventTicket::where('id', $list_ticket_id[1])->get());

        // dd($ticket_data);

    
        return view('profile.buyevent.personal-data', compact('event', 'ticket_qty', 'total_price', 'list_ticket_id', 'order'));

    }

    public function toCheckout(Request $request, $id, Order $order)
    {
        // dd($request->all());

        session(['name' => request()->input('name')]);
        session(['email' => request()->input('email')]);
        session(['phone_number' => request()->input('phone_number')]);
        session(['buyer_ticket_id' => request()->input('ticket_id')]);
        session(['event_id' => $id]);
        
        $buyer_ticket_id = session()->get('buyer_ticket_id');
        $name = session()->get('name');
        $email = session()->get('email');
        $phone_number = session()->get('phone_number');
        $list_ticket_id = session()->get('ticket_id');
        // dd(count($buyer_ticket_id));
        $event = Event::find($id);
        session(['event_id' => $id]);
        $total_price = session()->get(
            'total_price');
        $ticket_qty = session()->get('ticket_total');
        // dd($ticket_qty);
        $buyer_data = [];
        for ($i=0; $i < count($buyer_ticket_id); $i++) { 
                $buyer_data[] = [
                    'ticket_id' => $buyer_ticket_id[$i],
                    'name' => $name[$i],
                    'email' => $email[$i],
                    'phone_number' => $phone_number[$i]
                ];
        }

        // dd(count($buyer_data));
        $insert_data_to_db = [];
        foreach ($buyer_data as $value) {
            $insert_data_to_db[] = [
                'user_id' => Auth::user()->id,
                'event_id' => $id,
                'ticket_id' => $value['ticket_id'],
                'order_id' => $order->id,
                'name' => $value['name'],
                'email' => $value['email'],
                'phone_number' => $value['phone_number'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }


        $inser_buyer_data = BuyTicketEvent::insert($insert_data_to_db);

        session(['buyer_data' => $buyer_data]);

        $result_data = [];
        foreach ($buyer_data as $data) {
            $result_data[$data['ticket_id']][] = $data;
        }
        // dd($result_data);
        $price_list = [];
        for ($z = 0; $z < count($ticket_qty); $z++) {
            $price_item = EventTicket::where('id', $list_ticket_id[$z])->first();
            // dd($price_item->ticket_price);
            // echo $price_item->ticket_price;
            $price_list[] = [
                "ticket_id" => $list_ticket_id[$z],
                "price" => $price_item->ticket_price,
                "quantity" => $ticket_qty[$z],
                "name" => $price_item->ticket_name,
            ];
        }

        $url_data = "https://api.sandbox.midtrans.com/v2/".$order->order_number."/status";
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

        // dd($responseBody->status_code);

        // if ($responseBody->status_code != 404) {
        //     dd($responseBody);
        // }

        // dd($price_list);

        $snapToken = $order->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
 
            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken($price_list);
            
            $order->payment_status = 'pending';
            $order->snap_token = $snapToken;
            $order->save();
        }

        // dd($request->all());

        return view('profile.buyevent.checkout', compact('event' ,'name', 'email', 'phone_number', 'order', 'snapToken', 'total_price', 'ticket_qty', 'list_ticket_id', 'result_data'));
    }

    public function save_data()
    {
        $name = session()->get('name');
        $email = session()->get('email');
        $phone_number = session()->get('phone_number');
        $list_ticket_id = session()->get('ticket_id');
        $user_id = Auth::user()->id;
        $event_id = session()->get('event_id');
        $event = Event::find($event_id);
        $email_user = Auth::user()->email;
        $buyer_data = session()->get('buyer_data');
        $order_id = session()->get('order_id');
        // dd($list_ticket_id);
        // dd($event->event_tickets->where('id', 3)->first()->ticket_name);
        $data_for_mail =[];

        foreach ($list_ticket_id as $key => $id) {
            $data_for_mail[] = [
                'ticket_name' => $event->event_tickets->where('id', $id)->first()->ticket_name,
                'ticket_link' => $event->event_tickets->where('id', $id)->first()->event_link,
            ];
        }

        // dd($data_for_mail);
        $mailData = $data_for_mail;

        // dd($mailData);

        $insert_data_to_db = [];
        foreach ($buyer_data as $value) {
            $insert_data_to_db[] = [
                'user_id' => Auth::user()->id,
                'event_id' => $event_id,
                'ticket_id' => $value['ticket_id'],
                'order_id' => $order_id,
                'name' => $value['name'],
                'email' => $value['email'],
                'phone_number' => $value['phone_number'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }


        $inser_buyer_data = BuyTicketEvent::insert($insert_data_to_db);
           
        
        Mail::to($email_user)->send(new SendDataToEmail($mailData));


        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);

        // return redirect()->back();
    }

    public function transaction_success(Request $request)
    {
        
        dd($request->all());
        // return redirect()->back();
    }

    public function transaction_notification(Request $request)
    {
        dd($request->all());
    }
}
