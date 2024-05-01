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
        Schema::create('trademark_ticket_histories', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('comment');
            $table->string('status');
            $table->string('file_path')->nullable();
            $table->bigInteger('related_TKT')->unsigned()->index()->nullable();
            $table->foreign('related_TKT')->references('id')->on('trade_mark_tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('added_by')->unsigned()->index()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('trademark_ticket_histories');
    }
};
