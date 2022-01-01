<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreIqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_iqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('stage_id');
            $table->foreignId('academy_year_id');
            $table->integer('score_question_iq');
            $table->enum('status',['sudah-dikerjakan','lolos','tidak'])->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('score_iqs');
    }
}
