<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyDastarkhwanRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_dastarkhwan_records', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('location');
            $table->string('timing');
            $table->string('name_of_item_distributed');
            $table->string('number_of_people');
            $table->string('amount_collected');
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
        Schema::dropIfExists('daily_dastarkhwan_records');
    }
}
