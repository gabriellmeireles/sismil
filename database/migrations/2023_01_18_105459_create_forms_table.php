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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('military_organization');
            $table->float('course_score',5,3);
            $table->string('graduation_class');
            $table->tinyInteger('year_service_time');
            $table->tinyInteger('month_service_time');
            $table->tinyInteger('day_service_time');
            $table->string('last_rank_degree');
            $table->string('punishment');
            $table->string('punishment_level');
            $table->foreignId('candidate_id')->constrained('candidates','id');
            $table->foreignId('contest_area_id')->constrained('contest_areas','id');
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
        Schema::dropIfExists('forms');
    }
};
