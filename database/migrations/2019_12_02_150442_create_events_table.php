<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('event_name');
            $table->enum('event_category',['Seminar','Workshop','Shortcourse'])->default('Seminar');
            $table->string('place');
            $table->integer('price_int');
            $table->integer('price_ext');
            $table->integer('quota');
            $table->datetime('event_start');
            $table->datetime('event_end');
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();
            $table->enum('SKPPL_type',[0,1])->nullable();
            $table->integer('SKPPL')->nullable();
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
