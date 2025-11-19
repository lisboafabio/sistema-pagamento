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
        Schema::create('sub_acquirer_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_acquirer_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('sub_acquirer_id')->references('id')->on('sub_acquirers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_acquirer_users');
    }
};
