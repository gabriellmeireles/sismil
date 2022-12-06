<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_settings', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->dateTime('initial_inscription');
            $table->dateTime('final_inscription');
            $table->dateTime('gru_expiration');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->float('min_male_height');
            $table->float('min_female_height');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('contest_settings');
    }
};
