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
        Schema::table('delegations_stock', function (Blueprint $table) {
            $table->unsignedBigInteger('equiepment_id')->nullable(); // deleted by
            $table->foreign('equiepment_id')->references('id')->on('typeofequipements')->onDelete('no action');

            $table->unsignedBigInteger('type_id')->nullable(); // deleted by
            $table->foreign('type_id')->references('id')->on('typeofequipements')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
