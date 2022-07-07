<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->float("fee_per_hour"); 
            $table->string('prefered_cities')->nullable();
            $table->string('days_hours')->nullable(); 
            $table->string('prefered_hours')->nullable();
            $table->boolean("negotiable")->default(0);
            $table->boolean("available")->default(1);
            $table->unsignedBigInteger('dj_id');
            $table->foreign('dj_id')->references('id')->on('djs');
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
        Schema::dropIfExists('configurations');
    }
}
