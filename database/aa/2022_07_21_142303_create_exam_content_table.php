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
        Schema::create('exam_content', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->unsignedBigInteger('exam_content_id');
            $table->string('question_source');
            $table->string('exam_type');
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
        Schema::dropIfExists('exam_content');
    }
};
