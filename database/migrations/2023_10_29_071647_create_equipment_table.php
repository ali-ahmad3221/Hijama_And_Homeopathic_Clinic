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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('total_qty')->nullable()->default(0);
            $table->integer('stockin')->nullable()->default(0);
            $table->integer('stockout')->nullable()->default(0);
            $table->integer('purchase_price');
            $table->integer('sale_price');
            $table->string('image');
            $table->enum('status', ['instock','outstock','pending']);
            $table->enum('type', ['cups','others'])->default('others');
            $table->text('date')->nullable();
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
        Schema::dropIfExists('equipment');
    }
};
