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
        Schema::table('sub_acquirers_bank_transactions', function (Blueprint $table) {
           $table->string('payer_name')->nullable()->after('sub_acquirer_id');
           $table->string('payer_document')->nullable()->after('payer_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_acquirers_bank_transactions', function (Blueprint $table) {
            $table->dropColumn('payer_name');
            $table->dropColumn('payer_document');
        });
    }
};
