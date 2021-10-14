<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('banner');
            $table->string("event_name");
            $table->string('date_start');
            $table->string('date_end');
            $table->string('time_start');
            $table->string('time_end');
            $table->text('description');
            $table->integer('max_ticket_user');
            $table->foreignId('user_id')->constrained('users');
            $table->string('status');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('events');
    }
}
