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
            $table->longText('subject');
            $table->string('place');
            $table->string('address');
            $table->dateTime('date');
            $table->date('subscription_start');
            $table->date('subscription_end');
            $table->integer('vacancies');
            $table->integer('restriction'); // Restrição do evento separada por níveis a serem definidos
            $table->float('price')->nullable();
            $table->string('note')->nullable();
            $table->string('image')->nullable();
            $table->string('performed_by')->nullable();
            $table->integer('workload');
            $table->string('type')->nullable();
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
