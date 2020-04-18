<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->longtext('info')->nullable();
            $table->string('lockdown_status', 10)->default('None');
            $table->text('lockdown_policy')->nullable();
            $table->date('lockdown_end')->nullable();
            $table->string('emergency')->nullable();
            $table->string('risk_rating')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('sec_states');
    }
}
