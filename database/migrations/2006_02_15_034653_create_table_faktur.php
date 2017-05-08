<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFaktur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_faktur', 10)->unique();
            $table->date('tgl_penjualan');
            $table->string('penerima', 30);
            $table->date('jatuh_tempo');
            $table->double('biaya_angkut');
            $table->integer('id_toko');
            $table->integer('id_pelanggan');
            $table->integer('id_kasir');
            $table->integer('id_sales');
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
        if (Schema::hasTable('faktur')) {
            Schema::drop('faktur');
        }
    }
}
