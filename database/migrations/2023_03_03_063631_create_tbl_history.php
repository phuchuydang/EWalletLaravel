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
        Schema::create('tbl_history', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('user_id');
            $table->string('type');
            $table->string('amount');
            $table->string('balance')->nullable();
            $table->string('description')->nullable();
            $table->boolean('status')->default(1);
            $table->string('created_date');
            $table->string('updated_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_history');
    }
};
