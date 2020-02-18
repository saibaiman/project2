<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->integer('1')->nullable();
            $table->integer('2')->nullable();
            $table->integer('3')->nullable();
            $table->integer('4')->nullable();
            $table->integer('5')->nullable();
            $table->integer('6')->nullable();
            $table->integer('7')->nullable();
            $table->integer('8')->nullable();
            $table->integer('9')->nullable();
            $table->integer('10')->nullable();
            $table->integer('11')->nullable();
            $table->integer('12')->nullable();
            $table->integer('13')->nullable();
            $table->integer('14')->nullable();
            $table->integer('15')->nullable();
            $table->integer('16')->nullable();
            $table->integer('17')->nullable();
            $table->integer('18')->nullable();
            $table->integer('19')->nullable();
            $table->integer('20')->nullable();
            $table->integer('21')->nullable();
            $table->integer('22')->nullable();
            $table->integer('23')->nullable();
            $table->integer('24')->nullable();
            $table->integer('25')->nullable();
            $table->integer('26')->nullable();
            $table->integer('27')->nullable();
            $table->integer('28')->nullable();
            $table->integer('29')->nullable();
            $table->integer('30')->nullable();
            $table->integer('31')->nullable();
            $table->integer('32')->nullable();
            $table->integer('33')->nullable();
            $table->integer('34')->nullable();
            $table->integer('35')->nullable();
            $table->integer('36')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('schedules');
    }
}
