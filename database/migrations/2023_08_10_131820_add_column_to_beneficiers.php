<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('beneficiers', function (Blueprint $table) {
            $table->string('sexe')->nullable();
            $table->string('image_endicape')->nullable();
            $table->string('document')->nullable();
            $table->string('milieu')->nullable();
            $table->string('date_RDV')->nullable();
            $table->string('code_bar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beneficiers', function (Blueprint $table) {
            $table->dropColumn('sexe');
            $table->dropColumn('image_endicape');
            $table->dropColumn('document');
            $table->dropColumn('milieu');
            $table->dropColumn('date_RDV');
            $table->dropColumn('code_bar');
        });
    }
};
