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
        Schema::create('declarations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->string("user_name");
            $table->string("user_password");
            $table->string("id_verification1");
            $table->string("id_verification2");
            $table->string("id_verification3");
            $table->string("legal_name");
            $table->string("signature");
            $table->date("date");
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
        Schema::dropIfExists('declarations');
    }
};
