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
        Schema::create('trade_mark_tickets', function (Blueprint $table) {
            $table->id();

            $table->string('TKT_Type');


            $table->bigInteger('client_id')->unsigned()->index()->nullable();   
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');                                                         
            $table->bigInteger('added_by')->unsigned()->index()->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('associate_id')->unsigned()->index()->nullable();
            $table->foreign('associate_id')->references('id')->on('associates')->onDelete('cascade');
            $table->bigInteger('methode_id')->unsigned()->index()->nullable();
            $table->foreign('methode_id')->references('id')->on('methodes')->onDelete('cascade');
            $table->bigInteger('assigned_to')->unsigned()->index()->nullable();
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('procedure_id')->unsigned()->index()->nullable();
            $table->foreign('procedure_id')->references('id')->on('procedures')->onDelete('cascade');
            $table->bigInteger('country_id')->unsigned()->index()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->bigInteger('applicant_id')->unsigned()->index()->nullable();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            
            $table->string('clientref')->default('n/a')->nullable();
            $table->text('aiptref')->nullable();
            
            $table->string('filing_date')->nullable(); 
            $table->string('filing_no')->nullable();
            $table->string('imageexport')->nullable();

            $table->string('class')->nullable();
            $table->string('register_no')->nullable();

            $table->string('trademark_name');
            $table->string('trademark_brief')->nullable();
            $table->string('img_paths')->nullable();

            $table->string('folder_path')->nullable();

            $table->bigInteger('related_TKT')->unsigned()->index()->nullable();
            $table->foreign('related_TKT')->references('id')->on('trade_mark_tickets')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('trade_mark_tickets');
    }
};
