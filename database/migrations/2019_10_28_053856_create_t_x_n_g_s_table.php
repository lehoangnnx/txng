<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTXNGSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_x_n_g_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('qr_code')->nullable();
            $table->text('product_name')->nullable();
            $table->date('mfg')->nullable();
            $table->date('exp')->nullable();
            $table->text('size')->nullable();
            $table->text('packing')->nullable();
            $table->longText('storage_advice')->nullable();
            $table->longText('packaging_factory')->nullable();
            $table->text('company_name')->nullable();
            $table->text('country')->nullable();
            $table->text('representative')->nullable();
            $table->text('company_address')->nullable();
            $table->text('cell_phone')->nullable();
            $table->text('email')->nullable();
            $table->text('fb')->nullable();
            $table->text('farm_name')->nullable();
            $table->text('farm_address')->nullable();
            $table->text('growing_area')->nullable();
            $table->text('standard_applied')->nullable();
            $table->text('description_header')->nullable();
            $table->longText('discription')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('t_x_n_g_s');
    }
}
