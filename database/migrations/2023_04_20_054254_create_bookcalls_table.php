<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookcalls', function (Blueprint $table) {
            $table->id();
            $table->string("call_type");
            $table->string("full_name");
            $table->integer("contact_number");
            $table->string("email");
            $table->string("jobtitle");
            $table->string("notes");
            $table->date("date");
            $table->time("time");
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
        Schema::dropIfExists('bookcalls');
    }
};