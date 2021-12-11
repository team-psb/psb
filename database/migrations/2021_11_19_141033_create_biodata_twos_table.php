<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_twos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('stage_id');
            $table->foreignId('academy_year_id');
            $table->foreignId('indonesia_provinces_id');
            $table->foreignId('indonesia_cities_id');
            $table->string('birth_place');
            $table->text('address');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('last_education');
            $table->string('name_school');
            $table->string('major');
            $table->string('organization');
            $table->string('achievment');
            $table->string('hobby');
            $table->string('goal');
            $table->string('skill');
            $table->string('memorization');
            $table->string('figure_idol');
            $table->text('chaplain_idol');
            $table->text('tauhid');
            $table->string('study_islamic');
            $table->string('read_book');
            $table->enum('smoker', ['iya', 'tidak']);
            $table->enum('girlfriend', ['iya', 'tidak']);
            $table->enum('gamer', ['iya', 'tidak']);
            $table->string('game_name')->nullable();
            $table->string('game_duration')->nullable();
            $table->text('reason_registration');
            $table->text('activity');
            $table->text('personal');
            $table->enum('parent', ['lengkap','bapak','ibu','yatim-piatu']);
            $table->string('father');
            $table->string('father_work');
            $table->string('mother');
            $table->string('mother_work');
            $table->integer('parent_income');
            $table->string('child_to');
            $table->string('brother');
            $table->string('no_guardian');
            $table->string('description_guardian')->nullable();
            $table->enum('permission_parent', ['iya', 'tidak']);
            $table->enum('have_laptop', ['iya', 'tidak']);
            $table->boolean('agree');
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
        Schema::dropIfExists('biodata_twos');
    }
}
