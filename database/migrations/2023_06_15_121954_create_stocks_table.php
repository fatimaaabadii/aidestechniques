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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipement_id')->nullable();
            $table->foreign('equipement_id')->references('id')->on('equipements')->onDelete('no action');
            $table->unsignedBigInteger('delegation_id')->nullable();
            $table->foreign('delegation_id')->references('id')->on('delegations')->onDelete('no action');
            $table->string('status')->default('En cours de traitement');
            $table->string('quantity');
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_id')->nullable(); // deleted by
            $table->foreign('deleted_id')->references('id')->on('users')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
