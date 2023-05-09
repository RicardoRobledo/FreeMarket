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
        Schema::create('us', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15);
            $table->string('middle_name', 20);
            $table->string('last_name', 20);
            $table->string('username', 20);
            $table->string('password', 100);
            $table->string('email')->unique();
            $table->string('country', 20);
            $table->string('city', 20);
            $table->string('state', 20);
            $table->string('neighborhood', 50);
            $table->string('street', 20);
            $table->integer('number');
            $table->string('postal_code', 5);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('us');
    }
};
