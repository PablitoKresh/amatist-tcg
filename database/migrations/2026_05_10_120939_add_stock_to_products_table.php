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
        Schema::table('products', function (Blueprint $table) {
            // Añadimos la columna stock, que sea un número entero, 
            // que por defecto sea 0 y que se coloque después del precio.
            $table->integer('stock')->default(0)->after('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Esto sirve para que si haces "migrate:rollback", se borre la columna
            $table->dropColumn('stock');
        });
    }
};