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
        Schema::create('services_qualifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->string("access_maintain");
            $table->string("support_worker");
            $table->string("personalcare_safety");
            $table->string("personal_activities");
            $table->string("specialisations");
            $table->string("Life_stage");
            $table->string("travel_transport");
            $table->string("vehicle_modification");
            $table->string("home_modification");
            $table->string("positive_behaviour_support");
            $table->string("equipment_receration");
            $table->string("vision_equipment");
            $table->string("nursing_care");
            $table->string("tasks_shared_living");
            $table->string("innovative_community");
            $table->string("development_life_skill");
            $table->string("childhood_supports");
            $table->string("specialised_hearing");
            $table->string("household_tasks");
            $table->string("interpreting_translating");
            $table->string("hearing_equipement");
            $table->string("Products_household_tasks");
            $table->string("communication_information");
            $table->string("participation_community");
            $table->string("physiology_personalWellbeing");
            $table->string("plan_managment");
            $table->string("therapeutic_support");
            $table->string("driver_training");
            $table->string("assistance_animals");
            $table->string("specialist_disability_accommodation");
            $table->string("support_coordination");
            $table->string("supported_employment");
            $table->string("hearing_services");
            $table->string("custom_prosthetics");
            $table->string("centre_based_activities");
            $table->enum("administering_medication",["yes","no"]);
            $table->enum("infectious_hazardous_substances",["yes","no"]);
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
        Schema::dropIfExists('services_qualifications');
    }
};