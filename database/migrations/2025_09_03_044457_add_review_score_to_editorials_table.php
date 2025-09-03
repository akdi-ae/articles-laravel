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
    Schema::table('editorials', function (Blueprint $table) {
        $table->unsignedInteger('review_score')->nullable()->after('status');
    });
}

public function down(): void
{
    Schema::table('editorials', function (Blueprint $table) {
        $table->dropColumn('review_score');
    });
}
};
