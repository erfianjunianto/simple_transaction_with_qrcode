<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableDetailFaktur extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_faktur', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('discount')->unsigned();
            $table->integer('ppn')->unsigned();
            $table->integer('qty')->unsigned();
            $table->integer('id_barang')->unsigned();
            $table->integer('id_faktur')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('detail_faktur')) {
            Schema::drop('detail_faktur');
        }
    }
}
