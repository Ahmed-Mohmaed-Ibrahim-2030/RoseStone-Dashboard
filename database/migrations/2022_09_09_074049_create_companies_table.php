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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->text('name_en');
            $table->text('name_ar');
            $table->text('about_en');
            $table->text('about_ar');
            $table->text('vision_en');
            $table->text('vision_ar');
            $table->text('preface_en');
            $table->text('preface_ar');
            $table->string('email')->unique();
            $table->string('web_site_url');
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
        Schema::dropIfExists('companies');
    }
};
