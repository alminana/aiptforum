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
        Schema::create('other_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->text('discription');
            $table->text('resone')->nullable();
            $table->string('file_path')->nullable();
            $table->bigInteger('solved_by')->unsigned()->index()->nullable();
            $table->foreign('solved_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('assigned_to')->unsigned()->index()->nullable();
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('added_by')->unsigned()->index()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('related_TKT_trademark')->unsigned()->index()->nullable();
            $table->foreign('related_TKT_trademark')->references('id')->on('patent_tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('related_TKT_patent')->unsigned()->index()->nullable();
            $table->foreign('related_TKT_patent')->references('id')->on('patent_tickets')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('other_tickets');
    }
};
