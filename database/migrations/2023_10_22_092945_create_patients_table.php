<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('address')->nullable();
            $table->string('name');
            $table->string('father_name');
            $table->string('contact_number');
            $table->string('age');
            $table->string('date');
            $table->string('diagnostic');
            $table->enum('gender', ['male','female']);
            $table->string('serial_num')->unique()->index();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
            $table->string('points')->nullable();
            $table->string('medicines')->nullable();
            $table->string('fee')->nullable();
            $table->string('cups_qty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
