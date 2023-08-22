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
        Schema::create('pasts', function (Blueprint $table) {
            $table->id();
            $table->string('aiptref');
            $table->string('clientref');
            $table->string('title');
            $table->string('client');
            //filing date
            $table->string('pct_date')->default('00-00-0000');
            $table->string('pct_no');
            $table->string('regular_date')->default('00-00-0000');
            $table->string('regular_no');
            //filing
            $table->string('filingno');
            //method
            $table->string('procedure');
            $table->string('requesteddate')->default('00-00-0000');
            $table->string('proceduredate')->default('00-00-0000');
      
            $table->string('country');
            //anniuty
            $table->string('annuity');
            $table->string('annual_office_fee');
            $table->string('annual_deadline')->default('00-00-0000');

            $table->string('deadline_Status');
            //user
            $table->foreignId('user_id');

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
        Schema::dropIfExists('pasts');
    }
};
