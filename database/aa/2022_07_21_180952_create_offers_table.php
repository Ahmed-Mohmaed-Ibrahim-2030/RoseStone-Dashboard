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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('discount-type');
            $table->Integer('discount-value');
            $table->string('title');
            $table->dateTime('announce-date');
            $table->dateTime('start-date');
            $table->dateTime('end-date');
            $table->foreignId('course-id')->constrained('courses');
            $table->foreignId('admin-id')->constrained('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
