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
            $table->increments('id');
            $table->string('event_title');
            $table->string('speaker');
            $table->string('subject');
            $table->string('place');
            $table->string('address');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('vacancies');
            $table->float('price');
            $table->string('note');
            $table->string('image');
            $table->string('performed_by');
            $table->integer('workload');
            $table->string('type');
            $table->boolean('subscription_status');
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
