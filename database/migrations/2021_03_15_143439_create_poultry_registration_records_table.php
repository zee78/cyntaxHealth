<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoultryRegistrationRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poultry_registration_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('cnic');
            $table->string('contact_number');
            $table->string('enrolment_date');
            $table->string('number_of_poultry_given');
            $table->string('amount');
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
        Schema::dropIfExists('poultry_registration_records');
    }
}
