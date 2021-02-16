<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->timestamp('date_of_birth')->nullable();
            $table->timestamp('date_of_death')->nullable()->default(null);
            $table->string('pond_number');
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
        Schema::dropIfExists('frogs');
    }
}
