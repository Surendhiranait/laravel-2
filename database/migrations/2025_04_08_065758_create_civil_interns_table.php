<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCivilInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civil_interns', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->integer('age'); 
            $table->string('mobile'); 
            $table->string('email'); 
            $table->string('city'); 
            $table->string('state'); 
            $table->string('country');
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
        Schema::dropIfExists('civil_interns');
    }
}
