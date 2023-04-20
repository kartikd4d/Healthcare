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
        Schema::create('rolepermissions', function (Blueprint $table) {
            $table->id();
            $table->foreignid('role_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('role_name');
            $table->string('key');
            $table->enum('status',["true","false"]);
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
        Schema::dropIfExists('rolepermissions');
    }
};
