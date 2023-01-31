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
            $table->string('slug')->default('00000');
            $table->string('agent');

            $table->string('clientref')->default('n/a');
            // $table->string('filingdate')->default('00-00-0000');
          

            $table->string('registrationno')->default('n/a');
            // $table->string('registrationdate')->default('00-00-0000');
            $table->string('renewal')->default('00-00-0000');
            $table->string('excerpt');
            $table->string('class')->default('class 0');
            $table->text('body');
            $table->text('country');
            $table->text('aiptref');

            $table->text('status');
            $table->date('proceduredate')->nullable(0);
            $table->date('requesteddate')->nullable(0);
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
