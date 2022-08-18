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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('ingredients');
            $table->text('category');
            $table->text('caption')->nullable();
            $table->text('calories');
            $table->text('description');
            $table->text('blog_username');
            $table->text('image')->nullable();
            $table->bigInteger('views')->nullable();
            $table->bigInteger('like')->nullable();
            $table->bigInteger('dislike')->nullable();
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
        Schema::dropIfExists('recipes');
    }
};
