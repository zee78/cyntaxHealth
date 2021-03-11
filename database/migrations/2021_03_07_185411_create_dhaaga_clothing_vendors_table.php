<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDhaagaClothingVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhaaga_clothing_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('dhaaga_clothing_vendor_id');
            $table->string('vendor_type');
            $table->string('vendor_name');
            $table->string('purchased_products');
            $table->string('phoneNo');
            $table->string('address');
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
        Schema::dropIfExists('dhaaga_clothing_vendors');
    }
}
