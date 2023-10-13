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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->integer('status')->default('1');
            $table->enum('homepage', ['Yes','No'])->default('No');
            $table->timestamps(); // created at /updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
