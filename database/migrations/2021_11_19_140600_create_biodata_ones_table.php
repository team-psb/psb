<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_ones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('stage_id');
            $table->foreignId('academy_year_id');
            $table->string('name');
            $table->enum('family', ['sangat-mampu', 'mampu', 'tidak-mampu']);
            $table->integer('age');
            $table->date('birth_date');
            $table->string('no_wa')->unique();
            $table->enum('gender', ['l', 'p']);

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
        Schema::dropIfExists('biodata_ones');
    }
}
