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
        Schema::create('area_requirement_contest_area', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contest_area_id')->constrained('contest_areas', 'id');
            $table->foreignId('contest_area_requirement_type_id')->constrained('contest_area_requirement_types', 'id');
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
        Schema::dropIfExists('area_requirement_contest_area');
    }
};
