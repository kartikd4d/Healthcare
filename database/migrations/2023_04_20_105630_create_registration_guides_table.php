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
        Schema::create('registration_guides', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("product_id");
            $table->string("title");
            $table->string("video_link");
            $table->enum("view_video",["0","1","2"]);
            $table->string("file_path");
            $table->string("file_name");
            $table->string("file_size");
            $table->enum("status",["true","false"]);
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
        Schema::dropIfExists('registration_guides');
    }
};
