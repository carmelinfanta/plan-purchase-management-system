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
        Schema::create('plan_addeds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('plan_name');
            $table->string('plan_price');
            $table->string('plan_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_addeds');
    }
};
