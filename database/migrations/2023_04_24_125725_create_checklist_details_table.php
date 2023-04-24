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
        Schema::create('checklist_details', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("prefix_applicant");
            $table->string("applicant_fullname");
            $table->string("prefix_director");
            $table->string("director_fullname");
            $table->string("date_of_birth");
            $table->string("email");
            $table->bigInteger("mobile");
            $table->string("abn");
            $table->string("registered_adn");
            $table->string("trading_name");
            $table->enum("gst_registration",["yes","no"]);
            $table->string("business_address");
            $table->string("states_operate");
            $table->enum("postal_address",["yes","no"]);
            $table->string("type_of_business");
            $table->string("legal_entity");
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
        Schema::dropIfExists('checklist_details');
    }
};
