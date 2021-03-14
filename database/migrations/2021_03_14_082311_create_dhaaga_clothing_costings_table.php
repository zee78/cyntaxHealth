<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhaagaClothingCostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhaaga_clothing_costings', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('type');
            $table->string('marketing_cost');
            $table->string('profit_percentage');
            $table->string('profit_amount');
            $table->string('gst');
            $table->string('total_direct_cost');
            $table->string('market_retail_price');
            $table->enum('status',['0' , '1']);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('dhaaga_clothing_costings');
    }
}
