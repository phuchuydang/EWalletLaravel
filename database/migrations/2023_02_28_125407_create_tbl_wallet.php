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
        Schema::create('tbl_wallet', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('balance')->default(0);
            $table->date('created_date');
            $table->date('updated_date')->nullable();
            $table->date('deleted_date')->nullable();
            $table->foreign('user_id')->references('id')->on('tbl_account')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_wallet');
    }
};
