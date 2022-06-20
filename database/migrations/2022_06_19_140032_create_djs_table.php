<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('djs', function (Blueprint $table) {
            $table->id();
            $table->text('bio')->nullable();
            $table->string('dj_name')->unique();
            $table->string('instagram')->unique()->nullable();
            $table->string('soundcloud')->unique()->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('gender', ['M', 'F', 'O']);
            $table->date("birthdate")->nullable();
            $table->string("cv")->nullable();
            $table->text('address')->nullable();
            $table->string('cv_url')->nullable();
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
        Schema::dropIfExists('djs');
    }
}
