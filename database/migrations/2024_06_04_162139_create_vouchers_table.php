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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description', 255)->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: Blocked, 1: Active');
            $table->tinyInteger('type')->default(0)->comment('0: Total Bill, 1: Percent');
            $table->integer('quantity');
            $table->decimal('amount', 19, 4);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
