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
        Schema::create('patent_ticket_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patent_tickets_id')->unsigned()->index()->nullable();
            $table->foreign('patent_tickets_id')->references('id')->on('patent_tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->string('type');
            $table->string('detail');
            $table->string('file_path')->nullable();
            $table->bigInteger('added_by')->unsigned()->index()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('related_TKT')->unsigned()->index()->nullable();
            $table->foreign('related_TKT')->references('id')->on('patent_tickets')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('patent_ticket_details');
    }
};
