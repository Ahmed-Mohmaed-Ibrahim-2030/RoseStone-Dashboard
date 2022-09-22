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
        Schema::create('certification', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // $table->unsignedBigInteger('certification_id');
            $table->double('degree');
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('exam_id')->constrained('exam');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certification');
    }
};
