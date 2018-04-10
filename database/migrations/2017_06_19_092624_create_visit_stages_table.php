<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_stages', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('visit_id');
            $table->string('stage_name');
            $table->string('ip', 15)->nullable();
            $table->text('agent_string')->nullable();
            $table->text('options')->nullable();
            $table->text('notes')->nullable();
            $table->timestampsTz();

            $table->index('visit_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_stages');
    }
}
