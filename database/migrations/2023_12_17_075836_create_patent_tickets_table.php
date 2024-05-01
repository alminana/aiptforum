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
        Schema::create('patent_tickets', function (Blueprint $table) {
            $table->id();

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
            $table->bigInteger('class_id')->unsigned()->index()->nullable();
            $table->foreign('class_id')->references('id')->on('trademark_classes')->onDelete('cascade');
            $table->bigInteger('procedure_id')->unsigned()->index()->nullable();
            $table->foreign('procedure_id')->references('id')->on('procedures')->onDelete('cascade');
            $table->bigInteger('country_id')->unsigned()->index()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
             
            $table->string('aiptref');
            $table->string('clientref');
            $table->string('title');
            
            //filing date
            $table->date('pct_date')->nullable();
            $table->string('pct_no')->nullable();
            $table->date('regular_date')->nullable();
            $table->string('regular_no')->nullable();
            //filing
            $table->string('filingno')->nullable();
            $table->string('filingdate')->nullable();

            //method
            $table->date('requesteddate')->nullable();
      
            //anniuty
            $table->string('annuity');
            $table->string('annual_office_fee');
            $table->date('annual_deadline')->nullable();

            $table->string('deadline_Status');
            $table->date('deadline_date');

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
        Schema::dropIfExists('patent_tickets');
    }
};
