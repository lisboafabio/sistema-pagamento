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
        Schema::table('pixes', function (Blueprint $table) {
            $table->string('currency', 3)->after('sub_acquirer_id');
            $table->timestamp('expires_at')->after('currency');
            $table->enum('status', array_column(\App\Enums\PixStatusEnum::cases(), 'value'))->after('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pixes', function (Blueprint $table) {
            $table->dropColumn('currency');
            $table->dropColumn('expires_at');
            $table->dropColumn('status');
        });
    }
};
