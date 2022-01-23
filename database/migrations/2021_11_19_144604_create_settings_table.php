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
            $table->date('announcement')->nullable();
            $table->string('no_msg')->nullable();
            $table->text('notification')->nullable();
            $table->text('notif_tahap1')->nullable();
            $table->text('notif_tahap1_sm')->nullable();
            $table->text('notif_tahap1_failed')->nullable();
            $table->text('notif_tahap2')->nullable();
            $table->text('notif_tahap2_failed')->nullable();
            $table->text('notif_tahap3')->nullable();
            $table->text('notif_tahap3_failed')->nullable();
            $table->text('notif_tahap4')->nullable();
            $table->text('notif_tahap4_failed')->nullable();
            $table->text('notif_tahap5')->nullable();
            $table->text('notif_tahap5_passed')->nullable();
            $table->text('notif_tahap5_failed')->nullable();
            $table->text('complete_tahap1')->nullable();
            $table->text('complete_tahap1_sm')->nullable();
            $table->text('complete_tahap2')->nullable();
            $table->text('complete_tahap3')->nullable();
            $table->text('complete_tahap4')->nullable();
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
