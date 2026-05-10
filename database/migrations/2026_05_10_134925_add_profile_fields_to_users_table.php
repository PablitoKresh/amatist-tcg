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
        Schema::table('users', function (Blueprint $table) {
            // Añadimos el avatar (guardaremos la ruta de la imagen)
            $table->string('avatar')->nullable()->after('email');
            
            // Añadimos el TCG favorito (para personalizar colores de la web)
            $table->string('favorite_tcg')->nullable()->after('avatar');
            
            // Un pequeño lema o bio de jugador
            $table->string('bio')->nullable()->after('favorite_tcg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Siempre es importante definir cómo deshacer los cambios
            $table->dropColumn(['avatar', 'favorite_tcg', 'bio']);
        });
    }
};