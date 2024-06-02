<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->string('alternatif');
            $table->string('umur');
            $table->string('bobot_umur');
            $table->string('beratBadan');
            $table->string('bobot_beratBadan');
            $table->string('tinggiBadan');
            $table->string('bobot_tinggiBadan');
            $table->string('alergi');
            $table->string('bobot_alergi');
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
        Schema::dropIfExists('alternatifs');
    }
}
