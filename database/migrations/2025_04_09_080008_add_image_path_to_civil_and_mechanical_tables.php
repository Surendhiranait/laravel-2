<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToCivilAndMechanicalTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('civil_employees', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('age');
        });

        Schema::table('mechanical_employees', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('civil_employees', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });

        Schema::table('mechanical_employees', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
}
