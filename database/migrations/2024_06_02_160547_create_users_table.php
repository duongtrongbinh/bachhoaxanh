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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('address_detail_id')->nullable();
            $table->string('social_id', 255)->nullable();
            $table->string('name', 255);
            $table->string('avatar', 255)->nullable();
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('remember_token', 255);
            $table->string('phone_number', 20);
            $table->string('user_code', 255);
            $table->tinyInteger('type_social')->default(0)->comment('0: Unsocial, 1: Google, 2: Facebook');
            $table->tinyInteger('active')->default(0)->comment('0: Guests, 1: Users');
            $table->tinyInteger('status')->default(1)->comment('0: Blocked, 1: Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
