<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * fernanda mendiola silva
     * @return void
     */
    public function up()
    {
        Schema::create('actuators', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("type");
            $table->integer("value");
            $table->integer("user_id")->unsigned();
            $table->date("date");
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
        Schema::dropIfExists('actuators');
    }
};
