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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_detail_id')->constrained()->onDelete('cascade');
            $table->string('name', 255);
            $table->string('company', 255);
            $table->string('tax_code', 255)->nullable();
            $table->string('contact_name', 255);
            $table->string('email', 255);
            $table->string('phone_number', 255);
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
