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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar')->nullable(true);
            $table->text('body_en');
            $table->text('body_ar')->nullable(true);
            $table->string('image')->nullable(true);
            $table->string('type')->nullable(true);
            $table->foreignId('admin_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('blogs');
    }
};
