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
        Schema::create('module_files', function (Blueprint $table) {
            $table->id();
            $table->foreignid('module_id')->nullable()->constrained()->cascadeOnDelete(); 
            $table->string('file_name');
            $table->decimal('file_size');
            $table->string('file_path');
            $table->enum('status',['true','false']);
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
        Schema::dropIfExists('module_files');
    }
};
