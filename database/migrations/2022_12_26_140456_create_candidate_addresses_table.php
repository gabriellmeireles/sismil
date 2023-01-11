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
        Schema::create('candidate_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('district');
            $table->string('city');
            $table->string('state',2);
            $table->string('zip_code');
            $table->foreignId('candidate_id')->constrained('candidates','id');
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
        Schema::dropIfExists('candidate_addresses');
    }
};
