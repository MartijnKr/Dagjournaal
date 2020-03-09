<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateDagelijksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dagelijks', function (Blueprint $table) {
            $table->increments('id');
            $table->time('tijd');
            $table->boolean('Mon')->default(0);
            $table->boolean('Tue')->default(0);
            $table->boolean('Wed')->default(0);
            $table->boolean('Thu')->default(0);
            $table->boolean('Fri')->default(0);
            $table->boolean('Sat')->default(0);
            $table->boolean('Sun')->default(0);
            $table->string('title');
            $table->longText('msg');
            $table->date('done')->default(Carbon::yesterday());
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
        Schema::dropIfExists('dagelijks');
    }
}
