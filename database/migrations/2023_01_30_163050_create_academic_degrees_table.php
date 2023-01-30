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
        Schema::create('academic_degrees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('institution_name');
            $table->string('institution_city');
            $table->year('graduation_date');
            $table->text('observation')->nullable();
            $table->tinyInteger('status');
            $table->foreignId('form_id')->constrained('forms', 'id');
            $table->foreignId('academic_degree_type_id')->constrained('academic_degree_types','id');
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
        Schema::dropIfExists('academic_degrees');
    }
};
