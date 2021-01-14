<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('university_id'); //FIELD INI AKAN MERUJUK KE TABLE PROVINCES
            $table->unsignedBigInteger('faculty_id'); // FIELD INI AKAN MERUJUK KE TABLE CITIES
            $table->string('name');
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
        Schema::dropIfExists('prodies');
    }
}
