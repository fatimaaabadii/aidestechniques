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
        Schema::create('disabilities', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->unsignedBigInteger('delegation_id')->nullable(); // deleted by
            $table->foreign('delegation_id')->references('id')->on('delegations')->onDelete('no action');
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
        Schema::dropIfExists('disablities');
    }
};