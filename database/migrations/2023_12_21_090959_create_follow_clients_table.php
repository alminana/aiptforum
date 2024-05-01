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
        Schema::create('follow_clients', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('followed_by')->unsigned()->index()->nullable();   
            $table->foreign('followed_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');  
            $table->bigInteger('client_id')->unsigned()->index()->nullable();   
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_clients');
    }
};
