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
        Schema::create('sub_acquirer_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_acquirer_id');
            $table->foreign('sub_acquirer_id')->references('id')->on('sub_acquirers');
            $table->integer('amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_acquirer_accounts');
    }
};
