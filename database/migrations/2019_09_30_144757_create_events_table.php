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
            $table->date('date');
            $table->date('subscription_start');
            $table->date('subscription_end');
            $table->integer('vacancies');
            $table->float('price')->nullable();
            $table->string('note')->nullable();
            $table->string('image')->nullable();
            $table->string('performed_by')->nullable();
            $table->integer('workload');
            $table->string('type')->nullable();
            $table->boolean('subscription_status')->nullable();
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
