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
            $table->string('balance');
            $table->string('description');
            $table->string('created_at');
            $table->string('updated_at')->nullable();
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
