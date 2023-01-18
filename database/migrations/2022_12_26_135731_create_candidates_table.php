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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('identity');
            $table->string('issuing_agency');
            $table->string('gender');
            $table->string('photo')->nullable();
            $table->date('birth_date');
            $table->string('marital_status');
            $table->tinyInteger('dependent_number');
            $table->string('nationality');
            $table->string('naturalness');
            $table->string('mother_name');
            $table->string('father_name');
            $table->float('height');
            $table->tinyInteger('weight');
            $table->foreignId('candidate_type_id')->constrained('candidate_types','id');
            $table->foreignId('user_id')->constrained('users','id');
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
        Schema::dropIfExists('candidates');
    }
};
