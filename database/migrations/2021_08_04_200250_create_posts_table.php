<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('filingdate')->default('0000-00-00');
            $table->string('registrationno');
            $table->string('registrationdate')->default('0000-00-00');
            $table->string('renewal')->default('0000-00-00');
            $table->string('excerpt');
            $table->text('class');
            $table->text('body');
            $table->text('country');
            $table->text('aiptref');
            $table->text('status');
            
            $table->foreignId('user_id');
            $table->foreignId('category_id');

            $table->integer('views')->default(0);
            $table->boolean('approved')->default(true);

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
        Schema::dropIfExists('posts');
    }
}
