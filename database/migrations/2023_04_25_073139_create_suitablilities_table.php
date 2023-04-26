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
        Schema::create('suitablilities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->enum("question1", ["yes", "no"])->comment("Has the Application ever been in receivership, subject to a winding-up order and/or under administration?");
            $table->enum("question2", ["yes", "no"])->comment("Have any of the Application's Key Personnel ever been appointed convicted of an indictable offense?");
            $table->enum("question3", ["yes", "no"])->comment("Is the Application , or any of the Applicant's Key Personal an insolved under adminstration, or been an insolvent under adminstation(or equivalent in home jurisdiction)");
            $table->enum("question4", ["yes", "no"])->comment("Have any of the Key Personal or any of the Applicant's Key Personal commenced bankruptcy proceeding?");
            $table->enum("question5", ["yes", "no"])->comment("Have any of the Application's Key Personnel been disqualified as a Director of a company ,and /or disqualified from managing corporation?");
            $table->enum("question6", ["yes", "no"])->comment("Have any of the Application's Key Personnel , or the Applicant overall, been subject to any findings or judgement in relation to fraud,misrepresentation or dishonesty?");
            $table->enum("question7", ["yes", "no"])->comment("Have any of the Application's Key Personnel been disqualified as a Director of a company ,and /or disqualified from managing corporation?");
            $table->enum("question8", ["yes", "no"])->comment("If you have circled YES to any of the above question .please provide a detailed comment below with explanation.");
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
        Schema::dropIfExists('suitablilities');
    }
};