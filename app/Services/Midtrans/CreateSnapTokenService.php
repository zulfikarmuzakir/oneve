<?php
 
namespace App\Services\Midtrans;

use App\Http\Controllers\BuyEventController;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;
use App\Models\EventTicket;
 
class CreateSnapTokenService extends Midtrans
{
    protected $order;
 
    public function __construct($order)
    {
        parent::__construct();
 
        $this->order = $order;
    }
 
    public function getSnapToken($price_list)
    {

        $params = [
            'transaction_details' => [
                'order_id' => $this->order->order_number,
                'gross_amount' => $this->order->total_price,
            ],
            'item_details' => $price_list,

            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => '081234567890',
            ],
        ];
 
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}