<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 40);
            $table->date('date');
            $table->string('category', 16);
            $table->integer('purchase');
            $table->integer('stock');
            $table->integer('unit_price');
            $table->text('image_url');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->tinyInteger('delete_flag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
