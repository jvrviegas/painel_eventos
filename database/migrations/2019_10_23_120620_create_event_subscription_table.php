<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_subscription', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subscripiton_key');
            $table->string('payment_situation');
            $table->tinyInteger('presence');

            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->integer('professional_id')->unsigned();
            $table->foreign('professional_id')
                ->references('id')->on('inscritos_coren')
                ->onDelete('cascade');

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
        Schema::dropIfExists('event_subscription');
    }
}
