<?php

use App\Enums\BankStatementEventEnum;
use App\Models\SubAcquirersBankTransactions;
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
        Schema::create('sub_acquirers_bank_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_acquirer_id');
            $table->foreign('sub_acquirer_id')->references('id')->on('sub_acquirers')->onDelete('cascade');
            $table->enum('event', array_column(BankStatementEventEnum::cases(), 'value'));
            $table->unsignedBigInteger('event_id');
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_acquirers_bank_transactions');
    }
};
