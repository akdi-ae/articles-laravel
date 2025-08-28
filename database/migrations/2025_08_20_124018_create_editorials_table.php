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
    {Schema::create('editorials', function (Blueprint $table) {
        $table->id();

        // Пользователь, который создал запись
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();

        $table->string('title_kk')->nullable();
        $table->string('title_ru')->nullable();
        $table->string('title_en')->nullable();

        $table->string('author_kk')->nullable();
        $table->string('author_ru')->nullable();
        $table->string('author_en')->nullable();

        $table->text('content')->nullable();
        $table->enum('status', ['draft', 'submitted'])->default('submitted');
        $table->string('file_path')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editorials');
    }
};
