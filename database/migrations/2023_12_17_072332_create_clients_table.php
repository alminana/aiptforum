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
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); 
            
            $table->string('client_name');
            $table->bigInteger('country_id')->unsigned()->index()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('type_clients_id')->unsigned()->index()->nullable();
            $table->foreign('type_clients_id')->references('id')->on('type_clients')->onDelete('cascade')->onUpdate('cascade');        
            $table->bigInteger('added_by')->unsigned()->index()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
            $table->bigInteger('associate_id')->unsigned()->index()->nullable();
            $table->foreign('associate_id')->references('id')->on('associates')->onDelete('cascade')->onUpdate('cascade');
            $table->string('img_path')->nullable();
            $table->boolean('following')->nullable();
 
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
        Schema::dropIfExists('clients');
    }
};