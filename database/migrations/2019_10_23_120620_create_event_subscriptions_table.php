<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subscripiton_key')->nullable();
            $table->tinyInteger('payment_situation')->nullable();
            $table->tinyInteger('presence')->default(0);

            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->integer('professional_id')->unsigned();
            $table->foreign('professional_id')
                ->references('id')->on('coren_inscritos')
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
        Schema::dropIfExists('event_subscriptions');
    }
}
