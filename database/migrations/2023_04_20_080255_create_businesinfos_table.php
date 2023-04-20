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
        Schema::create('businesinfos', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string("business_name");
            $table->string("business_type");
            $table->string("business_address");
            $table->string("business_email");
            $table->integer("business_phone_no");
            $table->string("states_operating_in");
            $table->string("abn_name");
            $table->string("registered_abn_name");
            $table->string("trading_name");
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
        Schema::dropIfExists('businesinfos');
    }
};
