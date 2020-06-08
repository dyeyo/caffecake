<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyPublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_publics', function (Blueprint $table) {
          $table->bigIncrements('id');

          $table->string('question1');
          $table->string('question2');
          $table->string('question3');
          $table->string('question4');
          $table->string('additions');
          $table->string('email');
          $table->string('verificate');

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
        Schema::dropIfExists('survey_publics');
    }
}
