<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventTicket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event_name = "Testing Nama Event";
        $slug = Str::slug($event_name, '-');

        $event = Event::create([
            'category_id' => 1,
            'banner' => '/img/slide1.png',
            'event_name' => $event_name,
            'date_start' => '2021-10-12',
            'date_end' => '2021-10-12',
            'time_start' => '13:40',
            'time_end' => '12:00',
            'description' => 'Ini adalah deskripsi',
            'user_id' => 1,
            'max_ticket_user' => '3',
            'status' => 'published',
            'slug' => $slug,
        ]);

        $data_ticket = [];

        for ($i=0; $i < 2; $i++) {
            $data_ticket[] = [
                'event_id' => $event->id,
                'ticket_name' => 'Nama Tiket Ke-'.($i+1),
                'ticket_total' => 200,
                'ticket_date_start' => '2021-10-10',
                'ticket_date_end' => '2021-10-12',
                'ticket_time_start' => '00:00',
                'ticket_time_end' => '23:59',
                'ticket_type' => 'paid',
                'ticket_price' => 40000 * ($i+1),
                'event_link' => 'https://meet.google.com',
            ];
        }

        $create = EventTicket::insert($data_ticket);
    }
}
