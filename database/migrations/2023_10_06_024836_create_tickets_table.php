<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->text('description', 1000);
            $table->enum('status', ['open', 'in_review', 'solving', 'close', 'rejected']);
            $table->softDeletes();
            $table->timestamps();

            $table->foreignUuid('user_uuid')
                ->references('uuid')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
