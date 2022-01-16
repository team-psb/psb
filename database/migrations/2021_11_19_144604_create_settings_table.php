<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academy_year_id')->nullable();
            $table->foreignId('stage_id')->nullable();
            $table->integer('question_iq_value')->nullable();
            $table->integer('question_personal_value')->nullable();
            $table->text('notification')->nullable();
            $table->date('announcement')->nullable();
            $table->string('no_msg')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
