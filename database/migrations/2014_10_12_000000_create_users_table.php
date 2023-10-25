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
            $table->string('gen_id')->nullable();
            $table->string('account_no')->nullable();
            $table->string('name');
            $table->string('address')->nullable();
            // $table->string('hbl');
            // $table->string('street');
            // $table->string('sub_vill');
            // $table->string('brgy_id');

            $table->string('house_block_lot')->nullable();
            $table->string('street')->nullable();
            $table->string('subdivision')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality')->nullable();
            $table->string('province')->nullable();
            $table->longtext('landmark')->nullable();

            $table->string('cp');
            $table->string('image_prof')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->default('0');
            $table->integer('is_Approved')->nullable();
            $table->integer('verification')->default('0');
            $table->integer('is_Online')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
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
