<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events');
            $table->string('ticket_name');
            $table->string('ticket_total');
            $table->string('ticket_date_start');
            $table->string('ticket_date_end');
            $table->string('ticket_time_start');
            $table->string('ticket_time_end');
            $table->string('ticket_type');
            $table->integer('ticket_price');
            $table->string('event_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_tickets');
    }
}
