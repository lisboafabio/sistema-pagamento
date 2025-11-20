<?php

use App\Enums\BankAccountTypeEnum;
use App\Enums\WithdrawStatusEnum;
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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('sub_acquirer_id');
            $table->foreign('sub_acquirer_id')->references('id')->on('sub_acquirers')->onDelete('cascade');
            $table->integer('amount');
            $table->string('bank_code');
            $table->string('bank_branch_number');
            $table->string('bank_account_number');
            $table->enum('bank_account_type', array_column(BankAccountTypeEnum::cases(), 'value'));
            $table->enum('status', array_column(WithdrawStatusEnum::cases(), 'value'));
            $table->datetime('withdrawn_in')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraws');
    }
};
