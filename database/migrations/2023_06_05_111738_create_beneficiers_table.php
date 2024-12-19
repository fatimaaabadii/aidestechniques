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
        Schema::create('beneficiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cin');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('image_cin')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('type_health_coverage')->nullable();
            $table->foreign('type_health_coverage')->references('id')->on('type_of_coverages')->onDelete('no action');
            $table->unsignedBigInteger('delegation_id')->nullable();
            $table->foreign('delegation_id')->references('id')->on('delegations')->onDelete('no action');
            $table->unsignedBigInteger('disabilitie_id')->nullable();
            $table->foreign('disabilitie_id')->references('id')->on('disabilities')->onDelete('no action');
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
        Schema::dropIfExists('beneficiers');
    }
};
