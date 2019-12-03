<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantingAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planting_area', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('farm_name')->nullable();
            $table->text('address')->nullable();
            $table->text('growing_area')->nullable();
            $table->text('standard')->nullable();
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
        Schema::dropIfExists('planting_area');
    }
}
