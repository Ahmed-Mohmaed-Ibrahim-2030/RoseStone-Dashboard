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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar')->nullable(true);
            $table->string('code')->unique();
            $table->decimal('price')->nullable(true);
            $table->decimal('expected_time')->nullable(true);
            $table->text('details_en');
            $table->text('details_ar')->nullable(true);
            $table->enum('status',['active','inactive']);
            $table->foreignId('category_id')->constrained('categories') ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users') ->onUpdate('cascade')
                ->onDelete('cascade');


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
        Schema::dropIfExists('products');
    }
};
