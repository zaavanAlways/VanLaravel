<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Controllers\MahasiswasController;
use App\Controllers\ProdiController;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            //
         $table->foreignId('prodi_id')->afrer('alamat')->constrained()
          ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            //
            $table->dropForeign('mahasiswas_prodi_id_foreign');
            $table->dropColumn('prodi_id');
        });
    }
};
